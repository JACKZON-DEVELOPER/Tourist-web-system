<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Imagen */

$this->title = 'Create Imagen';
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
