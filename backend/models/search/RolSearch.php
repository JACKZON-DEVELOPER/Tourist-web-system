<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rol;

/**
 * RolSearch represents the model behind the search form of `backend\models\Rol`.
 */
class RolSearch extends Rol
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rol', 'rol_valor'], 'integer'],
            [['rol_nombre'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Rol::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_rol' => $this->id_rol,
            'rol_valor' => $this->rol_valor,
        ]);

        $query->andFilterWhere(['like', 'rol_nombre', $this->rol_nombre]);

        return $dataProvider;
    }
}
