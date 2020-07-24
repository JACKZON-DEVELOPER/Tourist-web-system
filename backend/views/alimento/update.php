<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Alimento */

$this->title = 'Update Alimento: ' . $model->id_alimento;
$this->params['breadcrumbs'][] = ['label' => 'Alimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_alimento, 'url' => ['view', 'id' => $model->id_alimento]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alimento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
