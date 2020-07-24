<?php

namespace backend\controllers;

use yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;
use backend\models\Perfil;
use backend\models\Correo;
use backend\models\Telefono;

class UpgradeController extends \yii\web\Controller
{
    public function behaviors()
    {
      return [
      'access' => [
              'class' => \yii\filters\AccessControl::className(),
              'only' => ['index'],
              'rules' => [
                  [
                      'actions' => ['index'],
                      'allow' => true,
                      'roles' => ['@'],
                      'matchCallback' => function ($rule, $action) {
                          return RegistrosHelpers::requerirEstado('Activo');
                      }
                  ],

              ],
         ],

          'verbs' => [
              'class' => VerbFilter::className(),
              'actions' => [
                  'delete' => ['post'],
              ],
          ],
      ];
    }
    public function actionIndex()
    {
      //Photo by Maarten van den Heuvel on Unsplash
      $correo = new Correo;
      $telefono = new Telefono;

      $identele = null;
      $idencorreo = null;
      if ($telefono->load(Yii::$app->request->post()) && $telefono->save()) {
          $numtel = $telefono->numero_telefono;
          $correo->Direccion_correo = $numtel ;
          $identele = $telefono->id_telefono;

          if ( $correo->save()) {
              $idencorreo = $correo->id_correo;
            // code...
          }
            //return $this->render('index', ['persona' => $persona, 'correo' => $correo , 'telefono' => $telefono , 'identele' => $identele, 'idencorreo' => $idencorreo]);
      }

        $persona = Perfil::find()->where(['user_id' => yii::$app->user->identity->id])->one();
        ;
        return $this->render('index', ['persona' => $persona, 'correo' => $correo , 'telefono' => $telefono , 'identele' => $identele, 'idencorreo' => $idencorreo]);
    }

}
