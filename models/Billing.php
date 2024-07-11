<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billing".
 *
 * @property int $id
 * @property string|null $patient_id
 * @property float|null $total_cost
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property int|null $status
 *
 * @property CentralTriage $patient
 */
class Billing extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billing';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_cost'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['status'], 'integer'],
            [['patient_id', 'created_by', 'updated_by'], 'string', 'max' => 45],
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
            'patient_id' => 'Patient ID',
            'total_cost' => 'Total Cost',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
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
}
