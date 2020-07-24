<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Correo */

$this->title = 'Create Correo';
$this->params['breadcrumbs'][] = ['label' => 'Correos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="correo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
