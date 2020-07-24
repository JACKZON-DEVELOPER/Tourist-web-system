<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ImagenSearch */
/* @var $form yii\widgets\ActiveForm */
?>
 
<div class="imagen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_imagen') ?>

    <?= $form->field($model, 'titulo_imagen') ?>

    <?= $form->field($model, 'descripcion_imagen') ?>

    <?= $form->field($model, 'url_imagen') ?>

    <?= $form->field($model, 'galeria_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
