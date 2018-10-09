<?php

namespace backend\controllers;

use app\models\ImageUploadForm;
use app\models\UploadForm;
use backend\components\excel_mysql\library\Excel_mysql;
use common\models\ActionsContent;
use common\models\Contacts;
use common\models\Content;
use common\models\Currency;
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
                        'actions' => ['logout', 'upload', 'image-upload', 'content', 'currency', 'actions-content'],
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

    public function actionContent()
    {

        $model = Content::findOne(1);


        if (!empty($id = Yii::$app->request->post('Contacts')['id'])) {
            $contact = Contacts::findOne($id);
            if ($contact->load(Yii::$app->request->post()) && $contact->save()) {
                return $this->render('success', ['message' => 'Данные успешно сохранены!',
                    'title' => 'Содержание сайта']);
            }
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success', ['message' => 'Данные успешно сохранены!',
                'title' => 'Содержание сайта']);
        } else {
            $contacts = [];
            for ($i = 1; $i < 9; $i++) {
                $contacts[$i] = Contacts::findOne($i);
            }
            return $this->render('content', compact(['model', 'contacts']));
        }
    }

    public function actionActionsContent()
    {


        if (!empty($id = Yii::$app->request->post('ActionsContent')['id'])) {
            $content = ActionsContent::findOne($id);
            if ($content->load(Yii::$app->request->post()) && $content->upload()) {
                return $this->render('success', ['message' => 'Данные успешно сохранены!',
                    'title' => 'Содержание акции']);
            }
        }

        $contents = [];
        for ($i = 1; $i < 4; $i++) {
            $contents[$i] = ActionsContent::findOne($i);
        }

        return $this->render('actions-content', compact('contents'));
    }


        public function actionCurrency()
    {
        $model = Currency::findOne(1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->render('success', ['message' => 'Данные успешно сохранены!',
                'title' => 'Курсы валют']);
        } else {
            return $this->render('currency', [
                'model' => $model,
            ]);
        }
    }


    public function actionImageUpload()
    {

        $model = new ImageUploadForm();

        if (Yii::$app->request->isPost) {
            $model->image1 = UploadedFile::getInstance($model, 'image1');
            $model->image2 = UploadedFile::getInstance($model, 'image2');
            $model->code = trim(Yii::$app->request->post('ImageUploadForm')['code']);

            if ($model->upload()) {
                return $this->render('success', ['message' => 'Изображения успешно загружены!',
                    'title' => 'Загрузка изображений']);
            }
        }

        return $this->render('image-upload', ['model' => $model]);
    }


    public function actionUpload()
    {

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->excelFile = UploadedFile::getInstance($model, 'excelFile');
            if ($model->upload()) {
                $this->exceltomysql();
                return $this->render('success', ['message' => 'Таблица успешно загружена!',
                    'title' => 'Загрузка данных из файла']);
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
        if ($model->load(Yii::$app->request->post()) && $model->email == 'admin' && $model->login()) {
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

//        $connection = new \mysqli("localhost", "root", "", "lion");
        $connection = new \mysqli("lionau00.mysql.tools", "lionau00_lion", "fqsbp2m3", "lionau00_lion");


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
