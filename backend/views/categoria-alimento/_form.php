<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaAlimento */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-alimento-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_categoria')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
