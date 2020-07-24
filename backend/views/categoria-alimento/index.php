<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\CategoriaAlimentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categoria Alimentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-alimento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Categoria Alimento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_categoria_alimneto',
            'nombre_categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
