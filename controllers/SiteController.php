<?php

namespace app\controllers;

use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\data\Pagination;


class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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

    public function actionIndex()
    {
         // si el usuario no esta autenticado va a Login
			
		if (Yii::$app->user->isGuest) {
		 $model = new LoginForm();
		 if ($model->load(Yii::$app->request->post()) && $model->login()) 
             return $this->goBack();
         else 
            return $this->render('login', ['model' => $model,]);			           
        }
        if (!\Yii::$app->user->isGuest)   // si el usuario esta autenticado va a Inicio    
		    return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPrueba()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $query = Usuario::find()->where('1');
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();

        return $this->render('prueba', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'pages' => $pages,
        ]);      
    }

    public function actionRetrievepasswd()
    {
        return $this->render('retrievepassword');
    }

    public function actionSignup()
    {
        $model = new \app\models\User();
        return $this->render('signup', [   'model' => $model    ]);
    }


    public static function translate($message)
    {
        return LanguageController::translate($message);
    }


}
