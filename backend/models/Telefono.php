<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use backend\models\Restaurant;

/**
 * This is the model class for table "telefono".
 *
 * @property int $id_telefono
 * @property int $numero_telefono
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Telefono extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'telefono';
    }

    public function behaviors()
    {
     return [
         'timestamp' => [
           'class' => 'yii\behaviors\TimestampBehavior',
           'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                         ],
         'value' => new Expression('NOW()'),
                        ],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['numero_telefono'], 'required'],
            [['numero_telefono'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_telefono' => 'Id Telefono',
            'numero_telefono' => 'Numero Telefono',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'restaurantName' => Yii::t('app', 'Restaurant'),
            'restaurantId' => Yii::t('app', 'Restaurant'),
        ];
    }

    public  function  getRestaurant()
	  {
        return  $this->hasOne(Restaurant::className(),  ['telefono_id'  =>  'id_telefono']);
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
