<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RestaurantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_restaurant') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'nombre_restaurant') ?>

    <?= $form->field($model, 'descripcion_restaurant') ?>

    <?= $form->field($model, 'img_portada') ?>

    <?php // echo $form->field($model, 'img_logo') ?>

    <?php // echo $form->field($model, 'correo_id') ?>

    <?php // echo $form->field($model, 'telefono_id') ?>

    <?php // echo $form->field($model, 'menu_id') ?>

    <?php // echo $form->field($model, 'galeria_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
