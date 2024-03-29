<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Restaurant */

$this->title = 'Create Restaurant';
$this->params['breadcrumbs'][] = ['label' => 'Restaurants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'correo' => $correo,
        'telefono' => $telefono,
        'galeria' => $galeria,
        'menu' => $menu,


    ]) ?>

</div>
