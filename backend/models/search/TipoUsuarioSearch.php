<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TipoUsuario;

/**
 * TipoUsuarioSearch represents the model behind the search form of `backend\models\TipoUsuario`.
 */
class TipoUsuarioSearch extends TipoUsuario
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_tipo_usuario', 'tipo_usuario_valor'], 'integer'],
            [['tipo_usuario_nombre'], 'safe'],
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
        $query = TipoUsuario::find();

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
            'id_tipo_usuario' => $this->id_tipo_usuario,
            'tipo_usuario_valor' => $this->tipo_usuario_valor,
        ]);

        $query->andFilterWhere(['like', 'tipo_usuario_nombre', $this->tipo_usuario_nombre]);

        return $dataProvider;
    }
}
