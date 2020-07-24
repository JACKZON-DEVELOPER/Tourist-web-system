<?php

use yii\helpers\Html;

use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\RestaurantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Restaurantes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="restaurant-index container">

    <h1><?= Html::encode($this->title) ?></h1>

<div class="row">
  <div class="col-3">
<?php echo $this->render('_search', ['model' => $searchModel]); ?>
  </div>
  <div class="col-9">
    <?=
             ListView::widget([

            'dataProvider' => $dataProvider,

            'itemView' => '_imtems',
            'separator' => "<hr/>",
            'itemOptions' => ['class' => ''],
        ]);
    ?>
  </div>

</div>

</div>
