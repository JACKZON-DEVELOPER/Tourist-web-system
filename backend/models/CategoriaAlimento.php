<?php

namespace backend\models;

use Yii;
use backend\models\Alimento;

/**
 * This is the model class for table "categoria_alimento".
 *
 * @property int $id_categoria_alimneto
 * @property string|null $nombre_categoria
 */
class CategoriaAlimento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categoria_alimento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_categoria'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_categoria_alimneto' => 'Id Categoria Alimneto',
            'nombre_categoria' => 'Nombre Categoria',
        ];
    }

    public  function  getAlimentos()
	  {
      return  $this->hasMany(Alimento::className(),  ['categoria_id'  =>  'id_categoria_alimneto']);
	  }
}
