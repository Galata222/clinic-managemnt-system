<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AdmissionExamination;

/**
 * AdmissionExaminationSearch represents the model behind the search form of `app\models\AdmissionExamination`.
 */
class AdmissionExaminationSearch extends AdmissionExamination
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'descent', 'abdoscar', 'fhr', 'mraptured', 'liquor', 'admited', 'rswab', 'fhr_not_done', 'pres', 'position', 'fk_doctor', 'fw_ini', 'status'], 'integer'],
            [['fk_patient_id', 'timerom', 've_findings', 'rswabreason', 'tswab', 'examinitials', 'date_exam', 'created_by', 'date_created', 'modified_by', 'date_modified', 'rom_duration_days', 'rom_duration_hrs', 'admitted_by', 'abnormalities', 'spleen', 'extgenitals', 'vdischarge', 'tpr'], 'safe'],
            [['hrs', 'rr', 'systolic', 'diastolic', 'systolic2', 'diastolic2', 'temp', 'weight', 'height', 'muac', 'heightfundus', 'cervix'], 'number'],
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
        $query = AdmissionExamination::find();

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
            'hrs' => $this->hrs,
            'rr' => $this->rr,
            'systolic' => $this->systolic,
            'diastolic' => $this->diastolic,
            'systolic2' => $this->systolic2,
            'diastolic2' => $this->diastolic2,
            'temp' => $this->temp,
            'weight' => $this->weight,
            'height' => $this->height,
            'muac' => $this->muac,
            'heightfundus' => $this->heightfundus,
            'descent' => $this->descent,
            'cervix' => $this->cervix,
            'abdoscar' => $this->abdoscar,
            'fhr' => $this->fhr,
            'mraptured' => $this->mraptured,
            'timerom' => $this->timerom,
            'liquor' => $this->liquor,
            'admited' => $this->admited,
            'rswab' => $this->rswab,
            'tswab' => $this->tswab,
            'date_exam' => $this->date_exam,
            'date_created' => $this->date_created,
            'date_modified' => $this->date_modified,
            'fhr_not_done' => $this->fhr_not_done,
            'pres' => $this->pres,
            'position' => $this->position,
            'fk_doctor' => $this->fk_doctor,
            'fw_ini' => $this->fw_ini,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'fk_patient_id', $this->fk_patient_id])
            ->andFilterWhere(['like', 've_findings', $this->ve_findings])
            ->andFilterWhere(['like', 'rswabreason', $this->rswabreason])
            ->andFilterWhere(['like', 'examinitials', $this->examinitials])
            ->andFilterWhere(['like', 'created_by', $this->created_by])
            ->andFilterWhere(['like', 'modified_by', $this->modified_by])
            ->andFilterWhere(['like', 'rom_duration_days', $this->rom_duration_days])
            ->andFilterWhere(['like', 'rom_duration_hrs', $this->rom_duration_hrs])
            ->andFilterWhere(['like', 'admitted_by', $this->admitted_by])
            ->andFilterWhere(['like', 'abnormalities', $this->abnormalities])
            ->andFilterWhere(['like', 'spleen', $this->spleen])
            ->andFilterWhere(['like', 'extgenitals', $this->extgenitals])
            ->andFilterWhere(['like', 'vdischarge', $this->vdischarge])
            ->andFilterWhere(['like', 'tpr', $this->tpr]);

        return $dataProvider;
    }
}