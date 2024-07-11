<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient_card".
 *
 * @property int $id
 * @property string|null $patient_id
 * @property string|null $medical_record_number
 * @property string|null $CC
 * @property string|null $VV
 * @property string|null $hpi
 * @property string|null $past_medical_and_surgical_history
 * @property string|null $personal_and_social_hx
 * @property string|null $previous_hospital_admission
 * @property int|null $physical_examination
 * @property float|null $cost
 * @property string|null $pertinent_physical_examination
 * @property string|null $urgent_attention
 * @property string|null $assesment
 * @property string|null $lab_investigation
 * @property string|null $advice
 * @property int|null $appointment
 * @property string|null $physcian
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 *
 * @property LabResult $labInvestigation
 * @property CentralTriage $patient
 * @property Triage $physicalExamination
 */
class PatientCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'patient_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CC', 'hpi', 'past_medical_and_surgical_history', 'personal_and_social_hx', 'previous_hospital_admission', 'pertinent_physical_examination', 'urgent_attention', 'assesment', 'advice'], 'string'],
            [['physical_examination', 'appointment'], 'integer'],
            [['cost'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['patient_id', 'medical_record_number', 'VV', 'lab_investigation', 'physcian', 'created_by', 'updated_by'], 'string', 'max' => 45],
            [['lab_investigation'], 'exist', 'skipOnError' => true, 'targetClass' => LabResult::class, 'targetAttribute' => ['lab_investigation' => 'lab_result_id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => CentralTriage::class, 'targetAttribute' => ['patient_id' => 'patient_id']],
            [['physical_examination'], 'exist', 'skipOnError' => true, 'targetClass' => Triage::class, 'targetAttribute' => ['physical_examination' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'patient_id' => 'Patient ID',
            'medical_record_number' => 'Medical Record Number',
            'CC' => 'Cc',
            'VV' => 'Vv',
            'hpi' => 'Hpi',
            'past_medical_and_surgical_history' => 'Past Medical And Surgical History',
            'personal_and_social_hx' => 'Personal And Social Hx',
            'previous_hospital_admission' => 'Previous Hospital Admission',
            'physical_examination' => 'Physical Examination',
            'cost' => 'Cost',
            'pertinent_physical_examination' => 'Pertinent Physical Examination',
            'urgent_attention' => 'Urgent Attention',
            'assesment' => 'Assesment',
            'lab_investigation' => 'Lab Investigation',
            'advice' => 'Advice',
            'appointment' => 'Appointment',
            'physcian' => 'Physcian',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[LabInvestigation]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabInvestigation()
    {
        return $this->hasOne(LabResult::class, ['lab_result_id' => 'lab_investigation']);
    }

    /**
     * Gets query for [[Patient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatient()
    {
        return $this->hasOne(CentralTriage::class, ['patient_id' => 'patient_id']);
    }

    /**
     * Gets query for [[PhysicalExamination]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPhysicalExamination()
    {
        return $this->hasOne(Triage::class, ['id' => 'physical_examination']);
    }
}
