<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PatientCard;

/**
 * PatientCardSearch represents the model behind the search form of `app\models\PatientCard`.
 */
class PatientCardSearch extends PatientCard
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'physical_examination', 'appointment'], 'integer'],
            [['patient_id', 'medical_record_number', 'CC', 'VV', 'hpi', 'past_medical_and_surgical_history', 'personal_and_social_hx', 'previous_hospital_admission', 'pertinent_physical_examination', 'urgent_attention', 'assesment', 'lab_investigation', 'advice', 'physcian', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'safe'],
            [['cost'], 'number'],
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
        $query = PatientCard::find();

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
            'physical_examination' => $this->physical_examination,
            'cost' => $this->cost,
            'appointment' => $this->appointment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'patient_id', $this->patient_id])
            ->andFilterWhere(['like', 'medical_record_number', $this->medical_record_number])
            ->andFilterWhere(['like', 'CC', $this->CC])
            ->andFilterWhere(['like', 'VV', $this->VV])
            ->andFilterWhere(['like', 'hpi', $this->hpi])
            ->andFilterWhere(['like', 'past_medical_and_surgical_history', $this->past_medical_and_surgical_history])
            ->andFilterWhere(['like', 'personal_and_social_hx', $this->personal_and_social_hx])
            ->andFilterWhere(['like', 'previous_hospital_admission', $this->previous_hospital_admission])
            ->andFilterWhere(['like', 'pertinent_physical_examination', $this->pertinent_physical_examination])
            ->andFilterWhere(['like', 'urgent_attention', $this->urgent_attention])
            ->andFilterWhere(['like', 'assesment', $this->assesment])
            ->andFilterWhere(['like', 'lab_investigation', $this->lab_investigation])
            ->andFilterWhere(['like', 'advice', $this->advice])
            ->andFilterWhere(['like', 'physcian', $this->physcian])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'updated_by', $this->updated_by]);

        return $dataProvider;
    }
}
