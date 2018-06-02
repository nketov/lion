<?php
namespace backend\controllers;

use app\models\UploadForm;
use backend\components\excel_mysql\library\Excel_mysql;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionUpload()
    {

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            if ($model->upload()) {
            $this->exceltomysql();
                return $this->render('success-upload', ['model' => $model]);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    private function exceltomysql()
    {


// Определяем константу для включения режима отладки (режим отладки выключен)
        define("EXCEL_MYSQL_DEBUG", false);

// Соединение с базой MySQL
        $connection = new \mysqli("localhost", "root", "", "lion");
//// Выбираем кодировку UTF-8
        $connection->set_charset("utf8");

// Создаем экземпляр класса excel_mysql
        $excel_mysql_import_export = new Excel_mysql($connection, 'uploads/excel.xlsx');

// DROP Table
        if (mysqli_query($connection, "DROP TABLE excel")) {
//            echo "Table is deleted successfully\n\n";
        } else {
//            echo "Table is not deleted successfully\n\n";
        }


// DROP EXCEL TO SQL
        echo $excel_mysql_import_export->excel_to_mysql_by_index(
            "excel",
            0,
            array(
                "code",
                "name",
                "analogs",
                "cars",
                "fabricator",
                "quantity",
                "price",
                "currency",
                "note",
                null,
                "store",
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            ),
            2,
            false,
            false,
            false,
            array(
                "TEXT",
                "TEXT",
                "TEXT",
                "TEXT",
                "TEXT",
                "int(11)",
                "DECIMAL(10,2)",
                "TEXT",
                "TEXT",
                null,
                "TEXT",
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
                null,
            )
        ) ? "" : "Ошибка при загрузке файла\n\n";

// ADD PRIMARY KEY
        if (mysqli_query($connection, "ALTER TABLE excel ADD id int(10) unsigned AUTO_INCREMENT PRIMARY KEY")) {
//            echo "PRIMARY KEY successfully\n\n";
        } else {
            echo "Ошибка индексации таблицы\n\n";
        }


    }

}
