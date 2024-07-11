<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radilogy_request".
 *
 * @property int $id
 * @property string $radiology_request_id
 * @property string|null $patient_id
 * @property string|null $radiology_type
 * @property string|null $requested_by
 * @property string|null $performed_by
 * @property string|null $perform
 * @property string|null $LMP
 * @property string|null $report
 * @property float|null $cost
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property CentralTriage $patient
 * @property Radiology $radiologyType
 */
class RadilogyRequest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'radilogy_request';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['radiology_request_id'], 'required'],
            [['perform', 'LMP', 'report'], 'string'],
            [['cost'], 'number'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['radiology_request_id', 'patient_id', 'radiology_type', 'requested_by', 'performed_by'], 'string', 'max' => 45],
            [['radiology_type'], 'exist', 'skipOnError' => true, 'targetClass' => Radiology::class, 'targetAttribute' => ['radiology_type' => 'radiology_type_id']],
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
            'radiology_request_id' => 'Radiology Request ID',
            'patient_id' => 'Patient ID',
            'radiology_type' => 'Radiology Type',
            'requested_by' => 'Requested By',
            'performed_by' => 'Performed By',
            'perform' => 'Perform',
            'LMP' => 'Lmp',
            'report' => 'Report',
            'cost' => 'Cost',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[RadiologyType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRadiologyType()
    {
        return $this->hasOne(Radiology::class, ['radiology_type_id' => 'radiology_type']);
    }
}
