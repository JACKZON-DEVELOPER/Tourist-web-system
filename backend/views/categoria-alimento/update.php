<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaAlimento */

$this->title = 'Update Categoria Alimento: ' . $model->id_categoria_alimneto;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Alimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria_alimneto, 'url' => ['view', 'id' => $model->id_categoria_alimneto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-alimento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
