<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TipoUsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tipo Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipo_usuario',
            'tipo_usuario_nombre',
            'tipo_usuario_valor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
