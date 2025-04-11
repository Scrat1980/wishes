<?php

namespace app\controllers;

use app\models\forms\CreateWishForm;
use app\records\WishRecord;
use Exception;
use yii\db\Query;
use yii\helpers\VarDumper;
use yii\web\Controller;
use Yii;
use yii\web\Response;
use yii\web\UploadedFile;

class WishController extends Controller
{
    public function actionIndex(): string
    {
        $wishes = WishRecord::find()
            ->where(['user_id' => Yii::$app->user->id])
            ->all()
        ;

        return $this->render('index', ['wishes' => $wishes]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionView()
    {
        return $this->render('view');
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
                try {

                    $wish = new WishRecord();
                    $wish->name = $createWishForm->name;
                    $wish->description = $createWishForm->description;
                    $wish->link = $createWishForm->link;
                    $wish->price = $createWishForm->price;
                    $wish->is_secret = $createWishForm->is_secret == 'on' ? 1 : 0;
                    $wish->user_id = (int) Yii::$app->user->id;
                    $wish->photo_path = $createWishForm->savePhoto();
                    $wish->save();


                    $createWishForm->photo_path = $wish->photo_path;
                } catch (Exception $e) {
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
                $wishes = WishRecord::find()
                    ->where(['user_id' => Yii::$app->user->id])
                    ->all()
                ;

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', ['model' => $createWishForm]);

    }

}
