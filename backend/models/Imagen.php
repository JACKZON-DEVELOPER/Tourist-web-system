<?php

namespace backend\models;
use yii\db\ActiveRecord;
use yii\db\Expression;
use backend\models\Galeria;

use Yii;

/**
 * This is the model class for table "imagen".
 *
 * @property int $id_imagen
 * @property string $titulo_imagen
 * @property string $descripcion_imagen
 * @property string $url_imagen
 * @property int $galeria_id
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class Imagen extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'imagen';
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
            [['titulo_imagen', 'descripcion_imagen', 'url_imagen', 'galeria_id'], 'required'],
            [['titulo_imagen', 'descripcion_imagen', 'url_imagen'], 'string'],
            [['galeria_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_imagen' => 'Id Imagen',
            'titulo_imagen' => 'Titulo Imagen',
            'descripcion_imagen' => 'Descripcion Imagen',
            'url_imagen' => 'Url Imagen',
            'galeria_id' => 'Galeria ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    public  function  getGaleria()
	  {
        return  $this->hasOne(Galeria::className(),  ['id_galeria'  =>  'galeria_id']);
	  }


  public function upload(){

    $nombre_imagen= $this->id_imagen.$this->titulo_imagen;
    $this->url_imagen->saveAs('imagenes/galeria/'. $nombre_imagen .'.'. $this->url_imagen->extension);
    $this->url_imagen='imagenes/galeria/'. $nombre_imagen .'.'. $this->url_imagen->extension;
    $this->save();
  }



}
