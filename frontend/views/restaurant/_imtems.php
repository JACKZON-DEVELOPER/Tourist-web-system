<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
?>
<hr>

<div class="restaurant-search " style="">

      <div class="card bg-light" style="width:100%;">
        <div class="row ">
          <div class="col-4 d-flex justify-content-center">
            <?=Html::img('http://backend.yii2ja.com/'.$model->img_portada, ['alt'=>'Restaurant', 'class'=>'img-fluid', 'style'=>'max-height: 200px; padding:15px']);?>
          </div>


          <div class="card-body col-8">
            <h4 class="card-title"> Restaurante:<?= $model->nombre_restaurant ?> </h4>


            <div class="card-body  d-flex justify-content-end">
              <p>
                <?= Html::a('Ver mas', ['view', 'id' => $model->id_restaurant], ['class' => 'btn btn-success']) ?>

              </p>
            </div>
            </div>
  </div>
</div>

</div>
