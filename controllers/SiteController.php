<?php

namespace app\controllers;

use app\models\RegistrationForm;
use app\models\UploadForm;
use app\records\UserRecord;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
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
//            'captcha' => [
//                'class' => 'yii\captcha\CaptchaAction',
//                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
//            ],
        ];
    }

    /**
     * Displays homepage.
     *
     */
    public function actionIndex()
    {
//        return $this->redirect(['site/login']);
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegistrationForm();
        if (
            $model->load(Yii::$app->request->post())
            && $model->validate()
        ) {
            $model->register();

            return $this->goBack();
        }

        $model->password = '';
        return $this->render('registration', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (
                Yii::$app->request->post('UploadForm')['username']
            ) {
                $model->username = Yii::$app->request->post('UploadForm')['username'];
            }
            $model->upload();
        }

        try {
            $userId = \Yii::$app->getUser()->getId();
            $userRecord = UserRecord::findOne(['id' => $userId]);
            $avatarPath = $userRecord->avatar_path;
        } catch (\Exception) {
            $avatarPath = '';
        }

        return $this->render('upload', compact(
            'model',
            'avatarPath'
        ));
    }
}
