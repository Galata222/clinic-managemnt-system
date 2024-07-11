<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_specimen".
 *
 * @property int $id
 * @property int|null $pk_specimen_id
 * @property string|null $patient_id
 * @property string|null $comment
 * @property string|null $venesector_id
 * @property float|null $weight_before
 * @property float|null $weight_after
 * @property float|null $weight_diff
 * @property string|null $date_processed
 * @property string|null $time_processed
 * @property string|null $date_signal
 * @property string|null $time_signal
 * @property string|null $time_positivity
 * @property string|null $sterile_site
 * @property float|null $volume
 * @property string|null $units
 * @property string|null $date_created date record created
 * @property string $date_modified
 * @property string|null $time_point time point for specimen to extracts
 * @property string|null $end_date_processed
 * @property string|null $end_time_processed
 */
class LabSpecimen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_specimen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pk_specimen_id'], 'integer'],
            [['comment'], 'string'],
            [['weight_before', 'weight_after', 'weight_diff', 'volume'], 'number'],
            [['date_processed', 'time_processed', 'date_signal', 'time_signal', 'date_created', 'date_modified', 'end_date_processed', 'end_time_processed'], 'safe'],
            [['patient_id'], 'string', 'max' => 45],
            [['venesector_id', 'sterile_site'], 'string', 'max' => 50],
            [['time_positivity'], 'string', 'max' => 100],
            [['units'], 'string', 'max' => 2],
            [['time_point'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pk_specimen_id' => 'Pk Specimen ID',
            'patient_id' => 'Patient ID',
            'comment' => 'Comment',
            'venesector_id' => 'Venesector ID',
            'weight_before' => 'Weight Before',
            'weight_after' => 'Weight After',
            'weight_diff' => 'Weight Diff',
            'date_processed' => 'Date Processed',
            'time_processed' => 'Time Processed',
            'date_signal' => 'Date Signal',
            'time_signal' => 'Time Signal',
            'time_positivity' => 'Time Positivity',
            'sterile_site' => 'Sterile Site',
            'volume' => 'Volume',
            'units' => 'Units',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'time_point' => 'Time Point',
            'end_date_processed' => 'End Date Processed',
            'end_time_processed' => 'End Time Processed',
        ];
    }
}
