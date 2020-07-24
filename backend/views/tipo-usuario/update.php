<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoUsuario */

$this->title = 'Update Tipo Usuario: ' . $model->id_tipo_usuario;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_usuario, 'url' => ['view', 'id' => $model->id_tipo_usuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
