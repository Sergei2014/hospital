<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Cabinet;

/**
 * CabinetSearch represents the model behind the search form of `common\models\Cabinet`.
 */
class CabinetSearch extends Cabinet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_bran', 'num', 'pmsp'], 'integer'],
            [['name_prof'], 'safe'],
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
        $query = Cabinet::find();

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
            'id' => $this->id,
            'id_bran' => $this->id_bran,
            'num' => $this->num,
            'pmsp' => $this->pmsp,
        ]);

        $query->andFilterWhere(['like', 'name_prof', $this->name_prof]);

        return $dataProvider;
    }
}
