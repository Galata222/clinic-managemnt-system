<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_request".
 *
 * @property int $id
 * @property string|null $lab_request_id
 * @property string $lab_test_type_id
 * @property string|null $lab_test_item_id
 * @property string|null $patient_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $status
 *
 * @property LabResult[] $labResults
 * @property LabTestItems $labTestItem
 * @property LabTestTypes $labTestType
 * @property CentralTriage $patient
 */
class LabRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lab_test_type_id'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['lab_request_id', 'lab_test_type_id', 'lab_test_item_id', 'patient_id', 'created_by', 'updated_by'], 'string', 'max' => 45],
            [['lab_test_item_id'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestItems::class, 'targetAttribute' => ['lab_test_item_id' => 'test_item_id']],
            [['lab_test_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestTypes::class, 'targetAttribute' => ['lab_test_type_id' => 'test_type_id']],
            [['patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => CentralTriage::class, 'targetAttribute' => ['patient_id' => 'patient_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lab_request_id' => 'Lab Request ID',
            'lab_test_type_id' => 'Lab Test Type ID',
            'lab_test_item_id' => 'Lab Test Item ID',
            'patient_id' => 'Patient ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[LabResults]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLabResults()
    {
        return $this->hasMany(LabResult::class, ['lab_request_id' => 'lab_request_id']);
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
}
