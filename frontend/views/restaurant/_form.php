<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="restaurant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'nombre_restaurant')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion_restaurant')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img_portada')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img_logo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'correo_id')->textInput() ?>

    <?= $form->field($model, 'telefono_id')->textInput() ?>

    <?= $form->field($model, 'menu_id')->textInput() ?>

    <?= $form->field($model, 'galeria_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
