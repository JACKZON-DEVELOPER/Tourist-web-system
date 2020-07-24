<?php

namespace backend\models;

use Yii;
use backend\models\Restaurant;
use backend\models\Imagen;

/**
 * This is the model class for table "galeria".
 *
 * @property int $id_galeria
 * @property string|null $titulo
 */
class Galeria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'galeria';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_galeria' => 'Id Galeria',
            'titulo' => 'Titulo',
            'restaurantName' => Yii::t('app', 'Restaurant'),
            'restaurantId' => Yii::t('app', 'Restaurant'),
        ];
    }


    public  function  getRestaurant()
	  {
        return  $this->hasOne(Restaurant::className(),  ['galeria_id'  =>  'id_galeria']);
	  }
    public  function  getImagenes()
	  {
      return  $this->hasMany(Imagen::className(),  ['galeria_id'  =>  'id_galeria']);
	  }
    public function getRestaurantName()
    {
        return $this->restaurant->nombre_restaurant;
    }
    public function getRestaurantId()
    {
        return $this->restaurant ? $this->restaurant->id_restaurant : 'NINGUNO';
    }
}
