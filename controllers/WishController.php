<?php

namespace app\controllers;

use app\records\WishRecord;
use Exception;
use yii\web\Controller;
use Yii;
use yii\web\UploadedFile;

class WishController extends Controller
{
    public function actionIndex(): string
    {
        $model = new WishRecord();
        $model->name = 555;
        $model->save();
        die;

        if (
            Yii::$app->request->isPost
            && $model->load(Yii::$app->request->post())
        ) {
            if (
                $model->validate()
            ) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                try {
                    $model->saveData();
                } catch (Exception $e) {
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        } else {
//            $model->load(['model' => $user->attributes]);
        }

        return $this->render('index', ['model' => $model]);
    }

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
