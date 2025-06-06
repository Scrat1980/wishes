<?php

namespace app\controllers;

use app\models\RegistrationForm;
use app\models\UploadForm;
use app\records\UserRecord;
use Exception;
use app\services\MobileService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'mobile';
        parent::__construct($id, $module, $config);
    }
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
    public function actionIndex(): string
    {
        $isMobile = (new MobileService())->isMobile();

//        return $this->redirect(['site/login']);

        return
//            !$isMobile
//                ? $this->render('index')
//                :
        $this->render('/mobile/site/index')
        ;
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
        return $this->render('/mobile/site/login', [
            'model' => $model,
        ]);
    }

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
            $lf = new LoginForm();
            $lf->setAttributes($model->attributes);
            if ($lf->login()) {
                return $this->goHome();
            }
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
        $uploadForm = new UploadForm();
        if (
            Yii::$app->request->isPost
            && $uploadForm->load(Yii::$app->request->post())
        ) {
            if (
                $uploadForm->validate()
            ) {
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                try {
                    $uploadForm->save();
                } catch (Exception $e) {
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        } else {
            $userId = Yii::$app->user->getId();
            $user = UserRecord::findOne(['id' => $userId]);
            $uploadForm->load(['UploadForm' => $user->attributes]);
        }

        return $this->render('upload', ['uploadForm' => $uploadForm]);
    }
}
