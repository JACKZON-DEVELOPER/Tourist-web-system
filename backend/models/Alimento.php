<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\Menu;
use backend\models\CategoriaAlimento;
/**
 * This is the model class for table "alimento".
 *
 * @property int $id_alimento
 * @property string $nombre_alimento
 * @property string $descripcion_alimeto
 * @property int $precio_alimeto
 * @property string $imagen_alimeto
 * @property int $menu_id
 * @property int $categoria_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Alimento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alimento';
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
            [['nombre_alimento', 'descripcion_alimeto', 'precio_alimeto', 'imagen_alimeto', 'menu_id', 'categoria_id'], 'required'],
            [['nombre_alimento', 'descripcion_alimeto', 'imagen_alimeto'], 'string'],
            [['precio_alimeto', 'menu_id', 'categoria_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_alimento' => 'Id Alimento',
            'nombre_alimento' => 'Nombre Alimento',
            'descripcion_alimeto' => 'Descripcion Alimeto',
            'precio_alimeto' => 'Precio Alimeto',
            'imagen_alimeto' => 'Imagen Alimeto',
            'categoriaNombre' => Yii::t('app', 'Categoria Alimento'),
            'menu_id' => 'Menu ID',
            'categoria_id' => 'Categoria ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public  function  getMenu()
	  {
        return  $this->hasOne(Menu::className(),  ['id_menu'  =>  'menu_id']);
	  }
    public  function  getCategoria()
	  {
        return  $this->hasOne(CategoriaAlimento::className(),  ['id_categoria_alimneto'  =>  'categoria_id']);
	  }
//otras funciones
    public function getCategoriaNombre()
    {
        return $this->categoriaAlimento ? $this->categoriaAlimento->id_categoria_alimneto:'- sin categoria -';
    }

    public static function geCategoriaLista()
    {
        $dropciones = CategoriaAlimento::find()->asArray()->all();
        return ArrayHelper::map($dropciones, 'id_categoria_alimneto', 'nombre_categoria');
    }

    public function upload(){

      $nombre_imagen= $this->id_alimento.$this->nombre_alimento;
      $this->imagen_alimeto->saveAs('imagenes/restaurant/img_menu/'. $nombre_imagen .'.'. $this->imagen_alimeto->extension);
      $this->imagen_alimeto='imagenes/restaurant/img_menu/'. $nombre_imagen .'.'. $this->imagen_alimeto->extension;
      $this->save();
    }
}
