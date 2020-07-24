<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card  bg-light" style="">
  <div class="row no-gutters">
    <div class="col-md-3">
      <?=Html::img('http://backend.yii2ja.com/'.$model->imagen_alimeto, ['alt'=>'Restaurant', 'class'=>'img-fluid', 'style'=>'max-height: 200px; padding:15px']);?>
    </div>
    <div class="col-md-9">
      <div class="card-body">
        <h5 class="card-title"><?= $model->nombre_alimento ?></h5>
        <p class="card-text"><?= $model->descripcion_alimeto ?></p>
        <p class="card-text"><small class="text-muted">Precio: $ <?= $model->precio_alimeto ?></small></p>
      </div>
    </div>
  </div>
</div>
