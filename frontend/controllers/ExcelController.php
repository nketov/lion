<?php

namespace frontend\controllers;

use common\models\Cart;
use common\models\Currency;
use common\models\Order;
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

    public function actionDeleteCart($id)
    {
        $cart= new Cart;
        $cart->deleteCart($id);
        $this->redirect(Url::to(['/cart']));
    }

    public function actionOrder()
    {
        if (Yii::$app->user->isGuest) {
            Yii::$app->session->setFlash('success', 'Залогиньтесь для оформления заказа');
            return $this->redirect(Url::to(['/login']));
        }

        $cart=new Cart();
        if(!$summ=$cart->getSumm()){
            Yii::$app->session->setFlash('success', 'Корзина пуста, добавьте товары');
            return $this->redirect(Url::to(['/cart']));
         }

        $currency = !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR' ;
        $currencySign=Currency::$currencySign[$currency];
        $currency = ($currency == 'EUR') ? 1 : Currency::getCurrency($currency);

        $order=new Order();
        $order->user_id= Yii::$app->user->id;        
        $order->summ= $summ;
        $products = $cart->getProducts();
        $order_content = '';
        $count=1;
        foreach ($products as $id=>$array) {
            $product = self::findModel($id);            
            $order_content .= '<p>'.$count.'. '.$product->name. ' ('.$product->code.') '. $array['qty']. ' шт.  - '. round($product->price * $currency * $array['qty'], 2) . ' ' . $currencySign . ' </p>';
            $count++;
        }
        $order_content .= '<p><b> Всего: '.round($summ * $currency, 2) . ' ' . $currencySign .'</b></p>';
        $order->order_content = $order_content;
        $order->save();

        $user_text= '<p>Вы сделали заказ на сайте <b>lion-auto.com.ua</b>. Содержание заказа : </p>'.$order_content;
        mail(Yii::$app->user->identity->email, 'Заказ № '. $order->id, $user_text,"Content-type:text/html;charset=UTF-8");

        $shop_text= '<p>Пользователь  <b>'.Yii::$app->user->identity->email.'</b> сделал заказ. Содержание заказа : </p>'.$order_content;
        mail('ketovnv@gmail.com', 'Заказ № '. $order->id , $shop_text ,"Content-type:text/html;charset=UTF-8");
        mail('lionauto.in.ua@gmail.com', 'Заказ № '. $order->id , $shop_text ,"Content-type:text/html;charset=UTF-8");

        $cart->resetCart();
        Yii::$app->session->setFlash('success', 'Ваш заказ отправлен!');
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
