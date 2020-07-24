<?php

namespace backend\controllers;

use Yii;
use backend\models\Restaurant;
use backend\models\Correo;
use backend\models\Telefono;
use backend\models\Galeria;
use backend\models\Menu;

use backend\models\search\RestaurantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\web\UploadedFile;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;
/**
 * RestaurantController implements the CRUD actions for Restaurant model.
 */
class RestaurantController extends Controller
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
     * Lists all Restaurant models.
     * @return mixed
     */
    public function actionIndex()
    {
      if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {
        $searchModel = new RestaurantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
      } elseif ($ya_existe = RegistrosHelpers::userTieneRes('Restaurant')) {

        return $this->render('view', [
            'model' => $this->findModel($ya_existe),
        ]);

      } else {
        return $this->redirect(['create']);

      }

    }

    /**
     * Displays a single Restaurant model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {
            return $this->render('view', ['model' => $this->findModel($id), ]);
        } else if ($ya_existe = RegistrosHelpers::userTieneRes('Restaurant')) {
            return $this->render('view', ['model' => $this->findModel($ya_existe), ]);
        } else {
            return $this->redirect(['create']);
        }

    }

    /**
     * Creates a new Restaurant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionIracoreo()
     {
       return $this->redirect(["imagen/index"]);
     }
     public function actionIramenu()
     {
       return $this->redirect(["alimento/index"]);
     }

    public function actionCreate()
    {
       $model = new Restaurant();
       $correo = new Correo();
       $telefono = new Telefono();
       $galeria = new Galeria();
       $menu = new Menu();
       $model->user_id = \Yii::$app->user->identity->id;
       $nombreUsuario = $model->username;

       if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {

           if ($model->load(Yii::$app->request->post()) && $model->save()
           && $correo->load(Yii::$app->request->post()) && $correo->save()
           && $telefono->load(Yii::$app->request->post()) && $telefono->save()
           && $galeria->load(Yii::$app->request->post()) && $galeria->save()
           && $menu->load(Yii::$app->request->post()) && $menu->save()

         ) {



             $idencorreo = $correo->id_correo;
             $model->correo_id = $idencorreo;
             $model->save();

             $identelefono = $correo->id_telefono;
             $model->telefono_id = $identelefono;
             $model->save();

             $galeria->Titulo= 'restaurant TG';
             $galeria->save();
             $menu->descripcion_menu = 'restaurant TM';
             $menu->save();

             if ( $galeria->save() && $menu->save()) {

               $idengaleria = $correo->id_galeria;
               $model->galeria_id = $idengaleria;
               $model->save();

               $idenmenu = $correo->id_menu;
               $model->menu_id = $idenmenu;
               $model->save();
             }

               return $this->redirect(['view', 'id' => $model->id_restaurant]);
           }
           return $this->render('create', [
               'model' => $model,
               'correo' => $correo,
               'telefono' => $telefono,
               'galeria' => $galeria,
               'menu' => $menu,
           ]);
       }else if ($ya_existe = RegistrosHelpers::userTieneRes('restaurant')) {

         return $this->render('view', [
           'model' => $this->findModel($ya_existe), ]);






       } else if ($model->load(yii::$app->request->post())
       && $correo->load(Yii::$app->request->post()) && $correo->save()
       && $telefono->load(Yii::$app->request->post()) && $telefono->save()
     ) {

          $nombre_imglogo='imglogo'.$model->nombre_restaurant;
          $model->img_logo=UploadedFile::getInstance($model, 'img_logo');
          $model->img_logo->saveAs('imagenes/restaurant/img_logo/'. $nombre_imglogo .'.'. $model->img_logo->extension);
          $model->img_logo='imagenes/restaurant/img_logo/'. $nombre_imglogo .'.'. $model->img_logo->extension;
          $model->save();

          $nombre_imgportada='imgportada'.$model->nombre_restaurant;
          $model->img_portada=UploadedFile::getInstance($model, 'img_portada');
          $model->img_portada->saveAs('imagenes/restaurant/img_portada/'. $nombre_imgportada .'.'. $model->img_portada->extension);
          $model->img_portada='imagenes/restaurant/img_portada/'. $nombre_imgportada .'.'. $model->img_portada->extension;
          $model->save();

          $idencorreo = $correo->id_correo;
          $model->correo_id = $idencorreo;
          $model->save();

          $identelefono = $telefono->id_telefono;
          $model->telefono_id = $identelefono;
          $model->save();


          $tiga = $model->nombre_restaurant.'restaurant TG';
          $galeria->titulo = $tiga;
          $galeria->save();

          $timen = $model->nombre_restaurant.'restaurant TM';
          $menu->descripcion_menu = $timen;
          $menu->save();


          if ( $galeria->save() && $menu->save()) {

            $idengaleria = $galeria->id_galeria;
            $model->galeria_id = $idengaleria;
            $model->save();

            $idenmenu = $menu->id_menu;
            $model->menu_id = $idenmenu;
            $model->save();
          }

          return $this->redirect(['view', 'id' => $model->id_restaurant]);

       } else {
           return $this->render('create', [
               'model' => $model,
               'correo' => $correo,
               'telefono' => $telefono,
               'galeria' => $galeria,
               'menu' => $menu,
           ]);
       }
        /*
        */
    }

    /**
     * Updates an existing Restaurant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$correo = $this->findModel($model->correo_id);
        $telefono = Telefono::findOne($model->telefono_id);
        $correo = Correo::findOne($model->correo_id);
        //$correomodel = Correo->

        if ($model->load(Yii::$app->request->post()) && $model->save()
            &&  $correo->load(Yii::$app->request->post()) && $correo->save()
            &&  $telefono->load(Yii::$app->request->post()) && $telefono->save()) {

          $nombre_imglogo='imglogo'.$model->nombre_restaurant;
          $model->img_logo=UploadedFile::getInstance($model, 'img_logo');
          $model->img_logo->saveAs('imagenes/restaurant/img_logo/'. $nombre_imglogo .'.'. $model->img_logo->extension);
          $model->img_logo='imagenes/restaurant/img_logo/'. $nombre_imglogo .'.'. $model->img_logo->extension;
          $model->save();

          $nombre_imgportada='imgportada'.$model->nombre_restaurant;
          $model->img_portada=UploadedFile::getInstance($model, 'img_portada');
          $model->img_portada->saveAs('imagenes/restaurant/img_portada/'. $nombre_imgportada .'.'. $model->img_portada->extension);
          $model->img_portada='imagenes/restaurant/img_portada/'. $nombre_imgportada .'.'. $model->img_portada->extension;
          $model->save();



            return $this->redirect(['view', 'id' => $model->id_restaurant]);
        }

        return $this->render('update', [
            'model' => $model,
            'correo' => $correo,
            'telefono' => $telefono,
        ]);
    }

    /**
     * Deletes an existing Restaurant model.
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
     * Finds the Restaurant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Restaurant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Restaurant::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
