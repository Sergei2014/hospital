<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Schedule;

/**
 * ScheduleSearch represents the model behind the search form of `common\models\Schedule`.
 */
class ScheduleSearch extends Schedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_bran', 'id_doc', 'id_prof', 'id_cab'], 'integer'],
            [['data', 'time_start', 'time_end'], 'safe'],
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
        $query = Schedule::find();

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
            'id_cab' => $this->id_cab,
            'id_area' => $this->id_area,
            'data' => $this->data,
            'time_start' => $this->time_start,
            'time_end' => $this->time_end,
        ]);

        return $dataProvider;
    }
}
