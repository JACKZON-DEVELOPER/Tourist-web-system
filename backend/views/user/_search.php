<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?php //$form->field($model, 'auth_key') ?>

    <?php //$form->field($model, 'password_hash') ?>

    <?php //$form->field($model, 'password_reset_token') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'estado_id') ->dropDownList($model->EstadoLista, ['prompt' => 'Elija una opcion']) ?>

    <?= $form->field($model, 'rol_id') ->dropDownList($model->rolLista, ['prompt' => 'Elija una opcion']) ?>

    <?= $form->field($model, 'tipo_usuario_id') ->dropDownList($model->tipoUsuarioLista, ['prompt' => 'Elija una opcion']) ?>

    <?= $form->field($model, 'created_at') ?>

    <?= $form->field($model, 'updated_at') ?>

    <?php //$form->field($model, 'verification_token') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
