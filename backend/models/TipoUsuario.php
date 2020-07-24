<?php

namespace backend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "tipo_usuario".
 *
 * @property int $id_tipo_usuario
 * @property string $tipo_usuario_nombre
 * @property int $tipo_usuario_valor
 */
class TipoUsuario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo_usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tipo_usuario_nombre', 'tipo_usuario_valor'], 'required'],
            [['tipo_usuario_valor'], 'integer'],
            [['tipo_usuario_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_usuario' => 'Id Tipo Usuario',
            'tipo_usuario_nombre' => 'Tipo Usuario Nombre',
            'tipo_usuario_valor' => 'Tipo Usuario Valor',
        ];
    }

    public function getUsers()
    {
      return $this->hasMany(User::className(), ['tipo_usuario_id' => 'id_tipo_usuario']);
    }
}
