<?php

namespace backend\controllers;

use Yii;
use yii\base\Model;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use backend\models\Correo;
use backend\models\Telefono;

class pruebaController extends \yii\web\Controller
{
    public function actionIndex()
    {
      $correo = Correo::findOne(1);


        $telefono = Telefono::findOne(1);



        $correo->scenario = 'update';
        $telefono->scenario = 'update';

        if ($correo->load(Yii::$app->request->post()) && $telefono->load(Yii::$app->request->post())) {
            $isValid = $correo->validate();
            $isValid = $telefono->validate() && $isValid;
            if ($isValid) {
                $correo->save(false);
                $telefono->save(false);
                return $this->redirect(['correo/index']);
            }
        }

        return $this->render('index', [
            'correo' => $correo,
            'telefono' => $telefono,
        ]);
    }

}
