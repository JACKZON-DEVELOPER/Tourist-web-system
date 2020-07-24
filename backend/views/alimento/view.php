<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Alimento */

$this->title = $model->nombre_alimento;
$this->params['breadcrumbs'][] = ['label' => 'Alimentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alimento-view">

    <h1><?= Html::encode('Alimento: '.$this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_alimento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_alimento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'nombre_alimento:ntext',
            'descripcion_alimeto:ntext',
            'precio_alimeto',

            'created_at',
            'updated_at',
        ],
    ]) ?>
<?=Html::img('@web/'.$model->imagen_alimeto, ['alt'=>$model->nombre_alimento, 'class'=>'img-responsive', 'style'=>'width:300px;']);?>
</div>
