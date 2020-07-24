<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Alimento */

$this->title = 'Create Alimento';
$this->params['breadcrumbs'][] = ['label' => 'Alimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
