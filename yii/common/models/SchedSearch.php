<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sched;

/**
 * SchedSearch represents the model behind the search form of `common\models\Sched`.
 */
class SchedSearch extends Sched
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_bran', 'id_doc', 'id_prof', 'id_area', 'id_cab'], 'integer'],
            [['data_start', 'data_end', 'monday_begin', 'monday_end', 'tuesday_begin', 'tuesday_end', 'wednesday_begin', 'wednesday_end', 'thursday_begin', 'thursday_end', 'friday_begin', 'friday_end', 'saturday_begin', 'saturday_end', 'sunday_begin', 'sunday_end'], 'safe'],
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
        $query = Sched::find();

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
            'id_doc' => $this->id_doc,
            'id_prof' => $this->id_prof,
            'id_area' => $this->id_area,
            'id_cab' => $this->id_cab,
            'type' => $this->type,
            'data_start' => $this->data_start,
            'data_end' => $this->data_end,
        ]);

        $query->andFilterWhere(['like', 'monday_begin', $this->monday_begin])
            ->andFilterWhere(['like', 'monday_end', $this->monday_end])
            ->andFilterWhere(['like', 'tuesday_begin', $this->tuesday_begin])
            ->andFilterWhere(['like', 'tuesday_end', $this->tuesday_end])
            ->andFilterWhere(['like', 'wednesday_begin', $this->wednesday_begin])
            ->andFilterWhere(['like', 'wednesday_end', $this->wednesday_end])
            ->andFilterWhere(['like', 'thursday_begin', $this->thursday_begin])
            ->andFilterWhere(['like', 'thursday_end', $this->thursday_end])
            ->andFilterWhere(['like', 'friday_begin', $this->friday_begin])
            ->andFilterWhere(['like', 'friday_end', $this->friday_end])
            ->andFilterWhere(['like', 'saturday_begin', $this->saturday_begin])
            ->andFilterWhere(['like', 'saturday_end', $this->saturday_end])
            ->andFilterWhere(['like', 'sunday_begin', $this->sunday_begin])
            ->andFilterWhere(['like', 'sunday_end', $this->sunday_end]);

        return $dataProvider;
    }
}
