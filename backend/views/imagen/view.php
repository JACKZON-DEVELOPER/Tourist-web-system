<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Imagen */

$this->title = $model->titulo_imagen;
$this->params['breadcrumbs'][] = ['label' => 'Imagens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="imagen-view">

    <h1><?= Html::encode('Imagen: '.$this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_imagen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_imagen], [
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

            'titulo_imagen:ntext',
            'descripcion_imagen:ntext',
            'created_at',
            'updated_at',
        ],
    ]) ?>
     <?=Html::img('@web/'.$model->url_imagen, ['alt'=>$model->titulo_imagen, 'class'=>'img-responsive', 'style'=>'width:300px;']);?>

</div>
