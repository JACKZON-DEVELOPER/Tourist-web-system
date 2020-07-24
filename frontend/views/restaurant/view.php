<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use backend\models\Imagen;




/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant

$this->title = $model->id_restaurant;
$this->params['breadcrumbs'][] = ['label' => 'Restaurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);*/
?>
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="js/lc_lightbox.lite.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/lc_lightbox.css" />
<link rel="stylesheet" href="skins/minimal.css" />

<div class="restaurant-view container">
  <div class="row" style="margin-bottom: 20px;">
    <div class="col">
      <?=Html::img('http://backend.yii2ja.com/'.$model->img_portada, ['alt'=>'Restaurant', 'class'=>'img-fluid img-thumbnail', 'style'=>'padding:20px; width:100%; max-height: 600px ;']);?>
    </div>
  </div>

  <div class="row" style="margin-bottom: 20px;">
    <div class="col-3">

      <div class="card border-info" style="">
        <div class="card-header">
          <?=Html::img('http://backend.yii2ja.com/'.$model->img_logo, ['alt'=>'Galeria', 'class'=>'img-fluid img-thumbnail rounded-circle', 'style'=>'max-height:250px; width:100%;']);?>
        </div>
        <div class="card-body text-info">
          <h5 class="card-title text-center"><?= $model->nombre_restaurant ?></h5>
          <ul class="list-group list-group-flush">
            <li class="list-group-item fas fa-phone"><?= $model->correoNombre ?></li>
            <li class="list-group-item fas fa-envelope"><?= $model->telefonoNumero ?></li>

          </ul>
        </div>
      </div>



    </div>
    <div class="col-9">
      <div class="row">
        <div class="col jumbotron">
          <h2 class="text-center text-uppercase"><?= $model->nombre_restaurant ?></h2>
          <br>
          <p class="text-left"> <?= $model->descripcion_restaurant ?></p>

        </div>

      </div>
      <div class="row" style="margin-bottom: 30px;">
        <div class="col">
          <h3>Menu</h3>
          <?=
                   ListView::widget([
                  'dataProvider' => $dataProviderz,

                  'itemView' => '_menu',
                  'options' => ['class' => ''],
                  'itemOptions' => ['class' => ''],
              ]);
          ?>
        </div>
      </div>

    </div>

  </div>

<div class="row" style="margin-bottom: 30px;">
  <div class="col">
    <h3>Galeria</h3>
    <?=
             ListView::widget([
            'dataProvider' => $dataProvider,

            'itemView' => '_galery',
            'options' => ['class' => 'card-columns'],
            'itemOptions' => ['class' => ''],
        ]);
    ?>
  </div>
</div>



  <script type="text/javascript">
      $(document).ready(function(e) {

      // live handler
      lc_lightbox('.elem', {
        wrap_class: 'lcl_fade_oc',
        gallery : true,
        fullscreen: true,
        thumb_attr: 'data-lcl-thumb',


        skin: 'minimal',
        radius: 0,
        padding	: 0,
        border_w: 0,
      });

    });
  </script>


</div>
