<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use backend\models\Restaurant;
/**
 * This is the model class for table "correo".
 *
 * @property int $id_correo
 * @property string $Direccion_correo
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Correo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'correo';
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
            [['Direccion_correo'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['Direccion_correo'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_correo' => 'Id Correo',
            'Direccion_correo' => 'Direccion Correo',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'restaurantName' => Yii::t('app', 'Restaurant'),
            'restaurantId' => Yii::t('app', 'Restaurant'),
        ];
    }

    public  function  getRestaurant()
	  {
        return  $this->hasOne(Restaurant::className(),  ['correo_id'  =>  'id_correo']);
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
