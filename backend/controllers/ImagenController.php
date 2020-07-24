<?php

namespace backend\controllers;

use Yii;
use backend\models\Imagen;
use backend\models\search\ImagenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;

/**
 * ImagenController implements the CRUD actions for Imagen model.
 */
class ImagenController extends Controller
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
     * Lists all Imagen models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new ImagenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Imagen model.
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
     * Creates a new Imagen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Imagen();
       $ya_existe = RegistrosHelpers::userTieneGa();
        $model->galeria_id= $ya_existe;


        if ($model->load(yii::$app->request->post())) {


            $model->url_imagen=UploadedFile::getInstance($model, 'url_imagen');
            $model->upload();

            return $this->redirect(['view', 'id' => $model->id_imagen]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Imagen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $ruta = $model->url_imagen;
        if ($model->load(yii::$app->request->post())) {

          try {
            unlink($ruta);
          } catch (\Exception $e) {

          }
        //  $ruta = $model->url_imagen;
        //  $model->descripcion_imagen = 'web/'. $model->url_imagen;

          $model->url_imagen=UploadedFile::getInstance($model, 'url_imagen');
          $model->upload();
            return $this->redirect(['view', 'id' => $model->id_imagen]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Imagen model.
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
     * Finds the Imagen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Imagen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Imagen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
