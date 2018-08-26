<?php

namespace frontend\controllers;

use common\models\Cart;
use common\models\Currency;
use Yii;
use common\models\Excel;
use common\models\ExcelSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExcelController implements the CRUD actions for Excel model.
 */
class ExcelController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Excel models.
     * @return mixed
     */
    public function actionIndex()
    {
           
        $searchModel = new ExcelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $currency = !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR' ;
        $currencySign=Currency::$currencySign[$currency];
        $currency = ($currency == 'EUR') ? 1 : Currency::getCurrency($currency);
        return $this->render('index', compact('searchModel','dataProvider', 'currency','currencySign'));        
    }

    /**
     * Displays a single Excel model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
{
    $model=$this->findModel($id);
    $currency = !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR' ;
    $currencyName=Currency::$currencyName[$currency];
    $currency = ($currency == 'EUR') ? 1 : Currency::getCurrency($currency);

    return $this->render('view', compact('model', 'currency','currencyName'));
}

    public function actionAddCart()
    {
        $id=Yii::$app->request->get('id');
        $qty=Yii::$app->request->get('qty');
        $product= Excel::findOne($id);
        if (empty($product)) return false;
        $session=Yii::$app->session;
        $session->open();
        $cart= new Cart;
        $cart->addCart($product,$qty);
        
        return  $_SESSION['cart.sum'];
    }

    public function actionResetCart()
    {
        $cart= new Cart;
        $cart->resetCart();
        $this->redirect(Url::to(['/cart']));
    }




    /**
     * Finds the Excel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Excel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Excel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
