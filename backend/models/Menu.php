<?php

namespace backend\models;

use Yii;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Restaurant;
use backend\models\Alimento;
/**
 * This is the model class for table "menu".
 *
 * @property int $id_menu
 * @property string $descripcion_menu
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion_menu'], 'required'],
            [['descripcion_menu'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_menu' => 'Id Menu',
            'descripcion_menu' => 'Descripcion Menu',
            'restaurantName' => Yii::t('app', 'Restaurant'),
            'restaurantId' => Yii::t('app', 'Restaurant'),
        ];
    }
    public  function  getRestaurant()
	  {
        return  $this->hasOne(Restaurant::className(),  ['menu_id'  =>  'id_menu']);
	  }
    public  function  getAlimentos()
	  {
      return  $this->hasMany(Alimento::className(),  ['menu_id'  =>  'id_menu']);
	  }
    //
    public function getRestaurantName()
    {
        return $this->restaurant->nombre_restaurant;
    }
    public function getRestaurantId()
    {
        return $this->restaurant ? $this->restaurant->id_restaurant : 'NINGUNO';
    }

}
