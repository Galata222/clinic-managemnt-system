<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_lab_test".
 *
 * @property int $id
 * @property int|null $pk_test_id
 * @property int|null $fk_test_type
 * @property int|null $fk_specimen
 * @property string|null $fk_patient
 * @property int|null $fk_result
 * @property string|null $date_done
 * @property string|null $date_created date record created
 * @property string $date_modified
 * @property string|null $result_date
 *
 * @property Patient $fkPatient
 * @property LabResult $fkResult
 * @property LabSpecimen $fkSpecimen
 * @property LabTestType $fkTestType
 */
class LabTest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_lab_test';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pk_test_id', 'fk_test_type', 'fk_specimen', 'fk_result'], 'integer'],
            [['date_done', 'date_created', 'date_modified', 'result_date'], 'safe'],
            [['fk_patient'], 'string', 'max' => 45],
            [['fk_patient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::class, 'targetAttribute' => ['fk_patient' => 'patient_id']],
            [['fk_result'], 'exist', 'skipOnError' => true, 'targetClass' => LabResult::class, 'targetAttribute' => ['fk_result' => 'id']],
            [['fk_specimen'], 'exist', 'skipOnError' => true, 'targetClass' => LabSpecimen::class, 'targetAttribute' => ['fk_specimen' => 'id']],
            [['fk_test_type'], 'exist', 'skipOnError' => true, 'targetClass' => LabTestType::class, 'targetAttribute' => ['fk_test_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pk_test_id' => 'Test ID',
            'fk_test_type' => 'Test Type ID',
            'fk_specimen' => 'Specimen ID',
            'fk_patient' => 'Patient ID',
            'fk_result' => 'Result ID',
            'date_done' => 'Date Done',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'result_date' => 'Result Date',
        ];
    }

    /**
     * Gets query for [[FkPatient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPatient()
    {
        return $this->hasOne(Patient::class, ['patient_id' => 'fk_patient']);
    }

    /**
     * Gets query for [[FkResult]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkResult()
    {
        return $this->hasOne(LabResult::class, ['id' => 'fk_result']);
    }

    /**
     * Gets query for [[FkSpecimen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkSpecimen()
    {
        return $this->hasOne(LabSpecimen::class, ['id' => 'fk_specimen']);
    }

    /**
     * Gets query for [[FkTestType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkTestType()
    {
        return $this->hasOne(LabTestType::class, ['id' => 'fk_test_type']);
    }
}