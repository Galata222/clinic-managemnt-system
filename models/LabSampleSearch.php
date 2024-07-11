<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LabSample;

/**
 * LabSampleSearch represents the model behind the search form of `app\models\LabSample`.
 */
class LabSampleSearch extends LabSample
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fk_specimen'], 'integer'],
            [['fk_patient', 'specimen_source', 'adm_sample', 'sample_designation', 'originated_from', 'vol_brought_unit', 'date_brought', 'time_brought', 'lab_tech_ini', 'csf_venesector', 'remarks', 'rejected_reason', 'reason_not_collected', 'date_collect', 'time_collect', 'creation_time', 'creation_name', 'sample_collected', 'date_created', 'date_modified', 'urine_dipstick', 'reject_specify', 'time_point', 'sample_collection_dtl', 'sample_receive_status', 'gram_stain'], 'safe'],
            [['vol_brought'], 'number'],
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
        $query = LabSample::find();

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
            'fk_specimen' => $this->fk_specimen,
            'vol_brought' => $this->vol_brought,
            'date_brought' => $this->date_brought,
            'time_brought' => $this->time_brought,
            'date_collect' => $this->date_collect,
            'time_collect' => $this->time_collect,
            'creation_time' => $this->creation_time,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
        ]);

        $query->andFilterWhere(['like', 'fk_patient', $this->fk_patient])
            ->andFilterWhere(['like', 'specimen_source', $this->specimen_source])
            ->andFilterWhere(['like', 'adm_sample', $this->adm_sample])
            ->andFilterWhere(['like', 'sample_designation', $this->sample_designation])
            ->andFilterWhere(['like', 'originated_from', $this->originated_from])
            ->andFilterWhere(['like', 'vol_brought_unit', $this->vol_brought_unit])
            ->andFilterWhere(['like', 'lab_tech_ini', $this->lab_tech_ini])
            ->andFilterWhere(['like', 'csf_venesector', $this->csf_venesector])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'rejected_reason', $this->rejected_reason])
            ->andFilterWhere(['like', 'reason_not_collected', $this->reason_not_collected])
            ->andFilterWhere(['like', 'creation_name', $this->creation_name])
            ->andFilterWhere(['like', 'sample_collected', $this->sample_collected])
            ->andFilterWhere(['like', 'urine_dipstick', $this->urine_dipstick])
            ->andFilterWhere(['like', 'reject_specify', $this->reject_specify])
            ->andFilterWhere(['like', 'time_point', $this->time_point])
            ->andFilterWhere(['like', 'sample_collection_dtl', $this->sample_collection_dtl])
            ->andFilterWhere(['like', 'sample_receive_status', $this->sample_receive_status])
            ->andFilterWhere(['like', 'gram_stain', $this->gram_stain]);

        return $dataProvider;
    }
}
