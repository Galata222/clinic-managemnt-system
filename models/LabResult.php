<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_result".
 *
 * @property int $id
 * @property string|null $lab_result_id
 * @property string|null $patient_id
 * @property string|null $lab_request_id
 * @property string|null $lab_test_type_id
 * @property string|null $lab_test_item_id
 * @property string|null $lab_result
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $status
 * @property string|null $lab_sample_id
 * @property string|null $lab_specimen
 *
 * @property LabRequest $labRequest
 * @property LabTestItems $labTestItem
 * @property LabTestTypes $labTestType
 * @property CentralTriage $patient
 * @property PatientCard[] $patientCards
 */
class LabResult extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_result';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['lab_result_id', 'patient_id', 'lab_request_id', 'lab_test_type_id', 'lab_test_item_id', 'lab_result', 'created_by', 'updated_by', 'lab_sample_id', 'lab_specimen'], 'string', 'max' => 45],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => CentralTriage::class, 'targetAttribute' => ['patient_id' => 'patient_id']],
            [['lab_test_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestItems::class, 'targetAttribute' => ['lab_test_item_id' => 'test_item_id']],
            [['lab_request_id'], 'exist', 'skipOnError' => true, 'targetClass' => LabRequest::class, 'targetAttribute' => ['lab_request_id' => 'lab_request_id']],
            [['lab_test_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestTypes::class, 'targetAttribute' => ['lab_test_type_id' => 'test_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lab_result_id' => 'Lab Result ID',
            'patient_id' => 'Patient ID',
            'lab_request_id' => 'Lab Request ID',
            'lab_test_type_id' => 'Lab Test Type ID',
            'lab_test_item_id' => 'Lab Test Item ID',
            'lab_result' => 'Lab Result',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
            'lab_sample_id' => 'Lab Sample ID',
            'lab_specimen' => 'Lab Specimen',
        ];
    }

    /**
     * Gets query for [[LabRequest]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabRequest()
    {
        return $this->hasOne(LabRequest::class, ['lab_request_id' => 'lab_request_id']);
    }

    /**
     * Gets query for [[LabTestItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabTestItem()
    {
        return $this->hasOne(LabTestItems::class, ['test_item_id' => 'lab_test_item_id']);
    }

    /**
     * Gets query for [[LabTestType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabTestType()
    {
        return $this->hasOne(LabTestTypes::class, ['test_type_id' => 'lab_test_type_id']);
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
     * Gets query for [[PatientCards]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPatientCards()
    {
        return $this->hasMany(PatientCard::class, ['lab_investigation' => 'lab_result_id']);
    }
}
