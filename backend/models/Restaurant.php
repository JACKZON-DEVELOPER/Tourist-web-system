<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Correo;
use backend\models\Telefono;
use backend\models\Galeria;
use backend\models\Menu;
use common\models\User;


/**
 * This is the model class for table "restaurant".
 *
 * @property int $id_restaurant
 * @property int $user_id
 * @property string $nombre_restaurant
 * @property string $descripcion_restaurant
 * @property string|null $img_portada
 * @property string|null $img_logo
 * @property int $correo_id
 * @property int $telefono_id
 * @property int $menu_id
 * @property int $galeria_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Restaurant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'restaurant';
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
            [['user_id', 'nombre_restaurant', 'descripcion_restaurant'], 'required'],
            [['user_id', 'correo_id', 'telefono_id', 'menu_id', 'galeria_id'], 'integer'],
            [['nombre_restaurant', 'descripcion_restaurant', 'img_portada', 'img_logo'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_restaurant' => 'Id Restaurant',
            'user_id' => 'User ID',
            'nombre_restaurant' => 'Nombre Restaurant',
            'descripcion_restaurant' => 'Descripcion Restaurant',
            'img_portada' => 'Img Portada',
            'img_logo' => 'Img Logo',
            'correo_id' => 'Correo ID',
            'telefono_id' => 'Telefono ID',
            'menu_id' => 'Menu ID',
            'galeria_id' => 'Galeria ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'correoNombre' => Yii::t('app', 'Correo'),
            'telefonoNumero' => Yii::t('app', 'Telefono'),


        ];
    }



//enlaces
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public  function  getCorreo()
    {
        return  $this->hasOne(Correo::className(), ['id_correo' => 'correo_id']);
    }
    public  function  getTelefono()
    {
        return  $this->hasOne(Telefono::className(), ['id_telefono' => 'telefono_id']);
    }
    public  function  getGaleria()
    {
        return  $this->hasOne(Galeria::className(), ['id_galeria' => 'galeria_id']);
    }
    public  function  getMenu()
    {
        return  $this->hasOne(Menu::className(), ['id_menu' => 'menu_id']);
    }
    //
    public function getUsername()
    {
        return $this->user->username;
    }
    public function getUserId()
    {
        return $this->user ? $this->user->id : 'NINGUNO';
    }

    public function getCorreoNombre()
    {
        return $this->correo->Direccion_correo;
    }
    public function setCorreoNombre()
    {
        return $this->correo->Direccion_correo;
    }

    public function getCorreoId()
    {
        return $this->correo ? $this->correo->id_correo : 'NINGUNO';
    }

    public function getTelefonoNumero()
    {
        return $this->telefono->numero_telefono;
    }

    public function getTelefonoId()
    {
        return $this->telefono ? $this->telefono->id_telefono : 'NINGUNO';
    }
}
