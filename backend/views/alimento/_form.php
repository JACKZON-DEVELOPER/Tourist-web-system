<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Alimento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alimento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_alimento')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion_alimeto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'precio_alimeto')->textInput() ?>

  
  <?= $form->field($model, 'imagen_alimeto')->fileInput()-> label('imagen') ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
