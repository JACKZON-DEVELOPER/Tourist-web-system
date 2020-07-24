<?php

namespace backend\controllers;

use Yii;
use backend\models\Alimento;
use backend\models\search\AlimentoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * AlimentoController implements the CRUD actions for Alimento model.
 */
class AlimentoController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Alimento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AlimentoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alimento model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Alimento model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
      $model = new Alimento();
      $ya_existe = RegistrosHelpers::userTieneMen();
      $model->menu_id= $ya_existe;
      $model->categoria_id = 1 ;



        if ($model->load(Yii::$app->request->post()) ) {

          $model->imagen_alimeto=UploadedFile::getInstance($model, 'imagen_alimeto');
          $model->upload();
            return $this->redirect(['view', 'id' => $model->id_alimento]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Alimento model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
          $ruta = $model->imagen_alimeto;
        if ($model->load(Yii::$app->request->post()) ) {
          try {
            unlink($ruta);
          } catch (\Exception $e) {

          }

          $model->imagen_alimeto=UploadedFile::getInstance($model, 'imagen_alimeto');
          $model->upload();
            return $this->redirect(['view', 'id' => $model->id_alimento]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Alimento model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Alimento model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alimento the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alimento::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
