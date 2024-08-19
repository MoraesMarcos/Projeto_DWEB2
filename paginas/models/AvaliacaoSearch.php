<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Avaliacao;

/**
 * AvaliacaoSearch represents the model behind the search form of `app\models\Avaliacao`.
 */
class AvaliacaoSearch extends Avaliacao
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idAvaliacao', 'nota', 'idCidade', 'idUsuario'], 'integer'],
            [['comentario', 'data'], 'safe'],
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
        $query = Avaliacao::find();

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
            'idAvaliacao' => $this->idAvaliacao,
            'nota' => $this->nota,
            'idCidade' => $this->idCidade,
            'idUsuario' => $this->idUsuario,
        ]);

        $query->andFilterWhere(['like', 'comentario', $this->comentario])
            ->andFilterWhere(['like', 'data', $this->data]);

        return $dataProvider;
    }
}
