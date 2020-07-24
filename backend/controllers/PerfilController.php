<?php

namespace backend\controllers;

use Yii;
use backend\models\Perfil;
use backend\models\search\PerfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;


/**
 * PerfilController implements the CRUD actions for Perfil model.
 */
class PerfilController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [

          'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'only' => ['index', 'view','create', 'update', 'delete'],
                'rules' => [

                        [
                          'actions' => ['index', 'view','create'],
                          'allow' => true,
                          'roles' => ['@'],
                          'matchCallback' => function ($rule, $action) {
                              return PermisosHelpers::requerirMinimoRol('Usuario')
                              && RegistrosHelpers::requerirEstado('Activo');
                        }
                      ],[
                          'actions' => ['update', 'delete'],
                          'allow' => true,
                          'roles' => ['@'],
                          'matchCallback' => function ($rule, $action) {
                              return PermisosHelpers::requerirMinimoRol('SuperUsuario')
                              && RegistrosHelpers::requerirEstado('Activo');
                          }
                        ],

                    ],
                ],


            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Perfil models.
     * @return mixed
     */

    public function actionIndex()
    {
      if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {
        $searchModel = new PerfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
      } else if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {
        return $this->render('view',['model' => $this->findModel($ya_existe),]);
      } else { return $this->redirect(['create']); }
    }

    /**
     * Displays a single Perfil model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {
            return $this->render('view', ['model' => $this->findModel($id),  ]);

        } else if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {


              return $this->render('view', [
                  'model' => $this->findModel($ya_existe),
              ]);

        } else {
          return $this->redirect(['create']);
        }

    }

    /**
     * Creates a new Perfil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

     $model = new Perfil;
     $model->user_id = \Yii::$app->user->identity->id;

     if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {

       if ($model->load(Yii::$app->request->post()) && $model->save()) {
           return $this->redirect(['view', 'id' => $model->id_perfil]);
       }

       return $this->render('create', [
           'model' => $model,
       ]);


     } else if ($ya_existe = RegistrosHelpers::userTiene('perfil')) {
         return $this->render('view', [
               'model' => $this->findModel($ya_existe),
           ]);
     } else if ($model->load(Yii::$app->request->post()) && $model->save()){
         return $this->redirect(['view', 'id' => $model->id_perfil]);
     } else {
         return $this->render('create', [
               'model' => $model,
                ]);
     }

      /**  $model = new Perfil();

        *if ($model->load(Yii::$app->request->post()) && $model->save()) {
        *    return $this->redirect(['view', 'id' => $model->id_perfil]);
        *}

        *return $this->render('create', [
        *    'model' => $model,
        *]);
        */
    }

    /**
     * Updates an existing Perfil model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        RegistrosHelpers::requerirUpgradeA('Pago');

        if ($es_admin = PermisosHelpers::requerirMinimoRol('admin')) {
            $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id_perfil]);
            }
            return $this->render('update', [
                'model' => $model,
            ]);

        } else if ($model =  Perfil::find()->where(['user_id' => Yii::$app->user->identity->id])->one())
        {
              if ($model->load(Yii::$app->request->post()) && $model->save()) {

                  return $this->redirect(['view']);
                } else {

                  return $this->render('update', [
                        'model' => $model,
                    ]);
                }
        } else {

           throw new NotFoundHttpException('No Existe el Perfil.');

        }

        /**$model = $this->findModel($id);

        *if ($model->load(Yii::$app->request->post()) && $model->save()) {
        *    return $this->redirect(['view', 'id' => $model->id_perfil]);
        *}
        *
        *return $this->render('update', [
        *    'model' => $model,
        *]);
        */
    }

    /**
     * Deletes an existing Perfil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        $model =  Perfil::find()->where(['user_id' => Yii::$app->user->identity->id])->one();

        $this->findModel($model->id_perfil)->delete();

        return $this->redirect(['site/index']);
        /**$this->findModel($id)->delete();
        *
        *return $this->redirect(['index']);
        */
    }

    /**
     * Finds the Perfil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Perfil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Perfil::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
