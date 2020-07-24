 <?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\PermisosHelpers;

/* @var $this yii\web\View */
/* @var $model backend\models\Perfil */

$this->title = $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Perfil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view ">

    <h1>Perfil: <?= Html::encode($this->title) ?></h1>
    <br>
    <p>
    <?php
      if (PermisosHelpers::userDebeSerPropietario('perfil', $model->id_perfil)) {

            echo Html::a('Update', ['update', 'id' => $model->id_perfil],
                ['class' => 'btn btn-primary']);
        } ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id_perfil], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de eliminar este perfil ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*['attribute'=>'userLink', 'format'=>'raw'],*/

            /*'id_perfil',*/
            /*'user_id',*/
            'user.username',
            'nombre:ntext',
            'apellido:ntext',
            'fecha_nacimiento',
            /*'created_at',*/
            /*'updated_at',*/
            'telefono',
            'user.email',
        ],
    ]) ?>

</div>
