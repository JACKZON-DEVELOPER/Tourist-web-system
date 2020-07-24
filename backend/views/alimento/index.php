<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AlimentoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Alimentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alimento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Alimento', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'nombre_alimento:ntext',
            'descripcion_alimeto:ntext',
            'precio_alimeto',
      
            //'menu_id',
            //'categoria_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
