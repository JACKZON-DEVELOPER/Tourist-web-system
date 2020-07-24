<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Telefono */

$this->title = 'Create Telefono';
$this->params['breadcrumbs'][] = ['label' => 'Telefonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefono-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
