<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Telefono */

$this->title = 'Update Telefono: ' . $model->id_telefono;
$this->params['breadcrumbs'][] = ['label' => 'Telefonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_telefono, 'url' => ['view', 'id' => $model->id_telefono]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="telefono-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
