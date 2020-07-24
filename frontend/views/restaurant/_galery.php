<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\search\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
$direccion = 'http://backend.yii2ja.com/'.$model->url_imagen;
?>

<div class="card">


  <a class="elem" href="<?= $direccion  ?>" title="<?= $model->titulo_imagen ?>" data-lcl-txt="<?= $model->descripcion_imagen ?>" data-lcl-thumb="<?= $direccion  ?>">

        <?=Html::img('http://backend.yii2ja.com/'.$model->url_imagen, ['alt'=>'galeria'.$model->url_imagen, 'class'=>'img-fluid img-thumbnail', 'style'=>'']);?>
  </a>

</div>
