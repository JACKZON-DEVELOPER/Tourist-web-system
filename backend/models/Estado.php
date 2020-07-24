<?php

namespace backend\models;
use common\models\User;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property int $id_estado
 * @property string $estado_Nombre
 * @property int $estado_valor
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['estado_Nombre', 'estado_valor'], 'required'],
            [['estado_valor'], 'integer'],
            [['estado_Nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'estado_Nombre' => 'Estado Nombre',
            'estado_valor' => 'Estado Valor',
        ];
    }
    public function getUsers()
    {
      return $this->hasMany(User::className(), ['estado_id' => 'id_estado']);
    }
}
