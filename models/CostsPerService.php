<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_costs_per_service".
 *
 * @property int $id
 * @property string|null $fk_patient_id
 * @property string|null $reason
 * @property float|null $cost
 *
 * @property Patient $fkPatient
 */
class CostsPerService extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_costs_per_service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reason'], 'safe'],
            [['cost'], 'number'],
            [['fk_patient_id'], 'string', 'max' => 45],
            [['fk_patient_id'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::class, 'targetAttribute' => ['fk_patient_id' => 'patient_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_patient_id' => 'Patient ID',
            'reason' => 'Reason',
            'cost' => 'Cost',
        ];
    }

    /**
     * Gets query for [[FkPatient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPatient()
    {
        return $this->hasOne(Patient::class, ['patient_id' => 'fk_patient_id']);
    }
}