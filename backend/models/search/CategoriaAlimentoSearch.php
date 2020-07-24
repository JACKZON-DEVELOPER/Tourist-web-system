<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\CategoriaAlimento;

/**
 * CategoriaAlimentoSearch represents the model behind the search form of `backend\models\CategoriaAlimento`.
 */
class CategoriaAlimentoSearch extends CategoriaAlimento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_categoria_alimneto'], 'integer'],
            [['nombre_categoria'], 'safe'],
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
        $query = CategoriaAlimento::find();

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
            'id_categoria_alimneto' => $this->id_categoria_alimneto,
        ]);

        $query->andFilterWhere(['like', 'nombre_categoria', $this->nombre_categoria]);

        return $dataProvider;
    }
}
