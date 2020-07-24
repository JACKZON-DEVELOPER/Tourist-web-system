<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Imagen;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;

/**
 * ImagenSearch represents the model behind the search form of `backend\models\Imagen`.
 */
class ImagenSearch extends Imagen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_imagen', 'galeria_id'], 'integer'],
            [['titulo_imagen', 'descripcion_imagen', 'url_imagen', 'created_at', 'updated_at'], 'safe'],
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
        if ($es_admin = PermisosHelpers::requerirMinimoRol('Admin')) {
          $query = Imagen::find();
        } elseif ($ya_existe = RegistrosHelpers::userTieneGa()) {
          $query = Imagen::find()->where(['galeria_id' => $ya_existe]);
        }




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
            'id_imagen' => $this->id_imagen,
            'galeria_id' => $this->galeria_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'titulo_imagen', $this->titulo_imagen])
            ->andFilterWhere(['like', 'descripcion_imagen', $this->descripcion_imagen])
            ->andFilterWhere(['like', 'url_imagen', $this->url_imagen]);

        return $dataProvider;
    }
}
