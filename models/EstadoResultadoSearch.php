<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoResultado;

/**
 * EstadoResultadoSearch represents the model behind the search form of `app\models\EstadoResultado`.
 */
class EstadoResultadoSearch extends EstadoResultado
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idestadores'], 'integer'],
            [['fechainicio', 'fechafin'], 'safe'],
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
        $query = EstadoResultado::find();

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
            'idestadores' => $this->idestadores,
            'fechainicio' => $this->fechainicio,
            'fechafin' => $this->fechafin,
        ]);

        return $dataProvider;
    }
}
