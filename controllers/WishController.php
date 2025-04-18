<?php

namespace app\controllers;

use app\models\forms\CreateWishForm;
use app\records\UserRecord;
use app\records\WishRecord;
use Exception;
use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;

class WishController extends Controller
{
    public function __construct($id, $module, $config = [])
    {
        $this->layout = 'mobile';
        parent::__construct($id, $module, $config);
    }

    public function actionIndex(): string
    {
        $wishes = WishRecord::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->all()
        ;
        $userId = Yii::$app->user->id;
        $user = UserRecord::find()->where(['id' => $userId])->one();
        $avatar = $user->avatar_path;
        $username = $user->username;

        return $this->render('../mobile/wish/index', [
            'wishes' => $wishes,
            'avatar' => $avatar,
            'username' => $username,
        ]);
    }

    public function actionView($id): Response|string
    {
        $createWishForm = new CreateWishForm();
        $wish = WishRecord::findOne($id);

        if (
            $wish
        ) {
            $createWishForm->setAttributes($wish->attributes);

            return $this->render('create', ['model' => $createWishForm]);
        }

        return $this->redirect('/wish');
    }

    public function actionEdit($id): Response|string
    {
        $createWishForm = new CreateWishForm();
        if (
            !Yii::$app->request->isPost
        ) {
            $wish = WishRecord::findOne($id);

            if (
                $wish
            ) {
                $createWishForm->setAttributes($wish->attributes);
                $createWishForm->id = $wish->id;

                return $this->render('create', ['model' => $createWishForm]);
            }
        } else {
            $createWishForm->load(Yii::$app->request->post());
            $createWishForm->imageFile = UploadedFile::getInstance($createWishForm, 'imageFile');
            $wish = WishRecord::findOne($id);
            $wish->id = $createWishForm->id;
            $wish->name = $createWishForm->name;
            $wish->description = $createWishForm->description;
            $wish->link = $createWishForm->link;
            $wish->price = $createWishForm->price;
            $wish->user_id = (int) Yii::$app->user->id;
            $wish->is_secret = $createWishForm->is_secret == 'on' ? 1 : 0;
            try {
                $wish->photo_path = $createWishForm->savePhoto();
                $wish->save();

                $createWishForm->photo_path = $wish->photo_path;
            } catch (Exception $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }

            return $this->redirect(['index']);

        }

        return $this->redirect('/wish');
    }

    public function actionCreate(): string|Response
    {
        $createWishForm = new CreateWishForm();
        if (
            Yii::$app->request->isPost
            && $createWishForm->load(Yii::$app->request->post())
        ) {
            if (
                $createWishForm->validate()
            ) {
                $createWishForm->imageFile = UploadedFile::getInstance($createWishForm, 'imageFile');
                $wish = new WishRecord();
                $wish->name = $createWishForm->name;
                $wish->description = $createWishForm->description;
                $wish->link = $createWishForm->link;
                $wish->price = $createWishForm->price;
                $wish->user_id = (int) Yii::$app->user->id;
                $wish->is_secret = $createWishForm->is_secret == 'on' ? 1 : 0;
                try {
                    $wish->photo_path = $createWishForm->savePhoto();
                    $wish->save();

                    $createWishForm->photo_path = $wish->photo_path;
                } catch (Exception $e) {
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $createWishForm]);

    }

    public function actionDelete($id): Response
    {
        $wish = WishRecord::findOne($id);
        if ($wish) {
            try {
                $wish->delete();
            } catch (\Throwable $e) {
                Yii::$app->session->setFlash('error', $e->getMessage());
            }
            Yii::$app->session->setFlash('success', 'Wish deleted');
        }

        return $this->redirect('/wish');
    }

}
