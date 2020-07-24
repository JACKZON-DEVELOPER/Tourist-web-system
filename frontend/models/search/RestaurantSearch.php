<?php

namespace frontend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Restaurant;

/**
 * RestaurantSearch represents the model behind the search form of `backend\models\Restaurant`.
 */
class RestaurantSearch extends Restaurant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_restaurant', 'user_id', 'correo_id', 'telefono_id', 'menu_id', 'galeria_id'], 'integer'],
            [['nombre_restaurant', 'descripcion_restaurant', 'img_portada', 'img_logo', 'created_at', 'updated_at'], 'safe'],
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
        $query = Restaurant::find();

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
            'id_restaurant' => $this->id_restaurant,
            'user_id' => $this->user_id,
            'correo_id' => $this->correo_id,
            'telefono_id' => $this->telefono_id,
            'menu_id' => $this->menu_id,
            'galeria_id' => $this->galeria_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre_restaurant', $this->nombre_restaurant])
            ->andFilterWhere(['like', 'descripcion_restaurant', $this->descripcion_restaurant])
            ->andFilterWhere(['like', 'img_portada', $this->img_portada])
            ->andFilterWhere(['like', 'img_logo', $this->img_logo]);

        return $dataProvider;
    }
}
