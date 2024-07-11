<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LabResult;

/**
 * LabResultSearch represents the model behind the search form of `app\models\LabResult`.
 */
class LabResultSearch extends LabResult
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['lab_result_id', 'patient_id', 'lab_request_id', 'lab_test_type_id', 'lab_test_item_id', 'lab_result', 'created_at', 'updated_at', 'created_by', 'updated_by', 'lab_sample_id', 'lab_specimen'], 'safe'],
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
        $query = LabResult::find();

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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'lab_result_id', $this->lab_result_id])
            ->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'lab_request_id', $this->lab_request_id])
            ->andFilterWhere(['like', 'lab_test_type_id', $this->lab_test_type_id])
            ->andFilterWhere(['like', 'lab_test_item_id', $this->lab_test_item_id])
            ->andFilterWhere(['like', 'lab_result', $this->lab_result])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by])
            ->andFilterWhere(['like', 'lab_sample_id', $this->lab_sample_id])
            ->andFilterWhere(['like', 'lab_specimen', $this->lab_specimen]);

        return $dataProvider;
    }
}
