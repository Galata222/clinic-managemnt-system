<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LabSpecimen;

/**
 * LabSpecimenSearch represents the model behind the search form of `app\models\LabSpecimen`.
 */
class LabSpecimenSearch extends LabSpecimen
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pk_specimen_id'], 'integer'],
            [['patient_id', 'comment', 'venesector_id', 'date_processed', 'time_processed', 'date_signal', 'time_signal', 'time_positivity', 'sterile_site', 'units', 'date_created', 'date_modified', 'time_point', 'end_date_processed', 'end_time_processed'], 'safe'],
            [['weight_before', 'weight_after', 'weight_diff', 'volume'], 'number'],
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
        $query = LabSpecimen::find();

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
            'pk_specimen_id' => $this->pk_specimen_id,
            'weight_before' => $this->weight_before,
            'weight_after' => $this->weight_after,
            'weight_diff' => $this->weight_diff,
            'date_processed' => $this->date_processed,
            'time_processed' => $this->time_processed,
            'date_signal' => $this->date_signal,
            'time_signal' => $this->time_signal,
            'volume' => $this->volume,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'end_date_processed' => $this->end_date_processed,
            'end_time_processed' => $this->end_time_processed,
        ]);

        $query->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'venesector_id', $this->venesector_id])
            ->andFilterWhere(['like', 'time_positivity', $this->time_positivity])
            ->andFilterWhere(['like', 'sterile_site', $this->sterile_site])
            ->andFilterWhere(['like', 'units', $this->units])
            ->andFilterWhere(['like', 'time_point', $this->time_point]);

        return $dataProvider;
    }
}
