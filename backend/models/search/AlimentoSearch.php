<?php

namespace backend\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Alimento;
use common\models\PermisosHelpers;
use common\models\RegistrosHelpers;

/**
 * AlimentoSearch represents the model behind the search form of `backend\models\Alimento`.
 */
class AlimentoSearch extends Alimento
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_alimento', 'precio_alimeto', 'menu_id', 'categoria_id'], 'integer'],
            [['nombre_alimento', 'descripcion_alimeto', 'imagen_alimeto', 'created_at', 'updated_at'], 'safe'],
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
        $query = Alimento::find();
      } elseif ($ya_existe = RegistrosHelpers::userTieneMen()) {
        $query = Alimento::find()->where(['menu_id' => $ya_existe]);
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
            'id_alimento' => $this->id_alimento,
            'precio_alimeto' => $this->precio_alimeto,
            'menu_id' => $this->menu_id,
            'categoria_id' => $this->categoria_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'nombre_alimento', $this->nombre_alimento])
            ->andFilterWhere(['like', 'descripcion_alimeto', $this->descripcion_alimeto])
            ->andFilterWhere(['like', 'imagen_alimeto', $this->imagen_alimeto]);

        return $dataProvider;
    }
}
