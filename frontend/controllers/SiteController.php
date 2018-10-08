<?php

namespace frontend\controllers;

use common\models\Actions;
use common\models\Cart;
use common\models\Contacts;
use common\models\Currency;
use common\models\ExcelSearch;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'cart', 'about', 'actions', 'cabinet', 'rezerv'],
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
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExcelSearch();
        return $this->render('index', compact('searchModel'));
    }


    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->setFlash('success', 'Добро пожаловать!');
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $contacts=Contacts::find()->all();

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Спасибо за вопрос! Мы ответим Вам в ближайшее время!');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', compact(['model','contacts']));
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Проверьте свой почтовый ящик для дальнейших инструкций');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'Новый пароль сохранён');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionChangeCurrency()
    {

        if (Yii::$app->request->isAjax && ($data = Yii::$app->request->post())) {
            Yii::$app->session->set('currency', $data['currency']);
            Yii::$app->session->set('currency', $data['currency']);
        }
    }


    public function actionCart()
    {
        $cart = new Cart();
        $currency = !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR';
        $currencySign = Currency::$currencySign[$currency];
        $currency = ($currency == 'EUR') ? 1 : Currency::getCurrency($currency);

        return $this->render('cart', compact('cart', 'currency', 'currencySign'));
    }

    public function actionCabinet()
    {
        $user = Yii::$app->user->identity;

        if (!empty($phone = Yii::$app->request->post('User')['phone'])) {
            $user->phone = $phone;
            $user->save();
        }

        $actions = Actions::getDiscounts();
        $lastOrders = \common\models\Order::find()->where(['user_id' => $user->id])->orderBy(['date' => SORT_DESC])->limit(5)->all();

        $currency = !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR';
        $currencySign = Currency::$currencySign[$currency];
        $currency = ($currency == 'EUR') ? 1 : Currency::getCurrency($currency);
        return $this->render('cabinet', compact('actions', 'currency', 'currencySign', 'user','lastOrders'));
    }

    public function actionActions()
    {

        $actions = Actions::getDiscounts();
        $currency = !empty(Yii::$app->session->get('currency')) ? Yii::$app->session->get('currency') : 'EUR';
        $currencySign = Currency::$currencySign[$currency];
        $currency = ($currency == 'EUR') ? 1 : Currency::getCurrency($currency);

        return $this->render('actions', compact('actions', 'currency', 'currencySign'));
    }

    public function actionRezerv()
    {
        return $this->render('rezerv');
    }

}
