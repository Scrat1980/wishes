<?php

namespace app\controllers;

use app\records\WishRecord;
use yii\web\Controller;

class WishController extends Controller
{
    public function actionIndex(): string
    {
        $model = new WishRecord();

        return $this->render(
            'index',
            compact('model')
        );
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
