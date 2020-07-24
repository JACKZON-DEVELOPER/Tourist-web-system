<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */

$this->title = $model->nombre_restaurant;
$this->params['breadcrumbs'][] = ['label' => 'Restaurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="restaurant-view">

    <h1><?= Html::encode('Restaurante: '.$this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_restaurant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_restaurant], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
      <div class="col-md-7">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

                'nombre_restaurant:ntext',
                'descripcion_restaurant:ntext',

                'created_at',
                'updated_at',
            ],
        ]) ?>

      </div>
      <div class="col-md-5">
          <?=Html::img('@web/'.$model->img_portada, ['alt'=>$model->nombre_restaurant.'portada', 'class'=>'img-responsive', 'style'=>'width:300px;']);?>
          <?= Html::img('@web/'.$model->img_logo, ['alt'=>$model->nombre_restaurant.'portada', 'class'=>'img-responsive', 'style'=>'width:300px;']);?>

      </div>

    </div>
    <p><?= Html::a('  Galeria', ['iracoreo'], ['class' => 'btn btn-success far fa-images']) ?>
    <?= Html::a('  Menu', ['iramenu'], ['class' => 'btn btn-success fas fa-utensils']) ?> </p>


</div>
