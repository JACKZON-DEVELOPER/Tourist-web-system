<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_id')->dropDownList($model->EstadoLista, ['prompt' => 'Elija una opcion']) ?>

    <?= $form->field($model, 'rol_id')->dropDownList($model->rolLista, ['prompt' => 'Elija una opcion'])?>

    <?= $form->field($model, 'tipo_usuario_id')->dropDownList($model->tipoUsuarioLista, ['prompt' => 'Elija una opcion']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
