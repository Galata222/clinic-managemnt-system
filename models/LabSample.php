<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lab_sample".
 *
 * @property int $id
 * @property int|null $fk_specimen
 * @property string|null $fk_patient
 * @property string|null $specimen_source
 * @property string|null $adm_sample
 * @property string|null $sample_designation
 * @property string|null $originated_from
 * @property float|null $vol_brought
 * @property string|null $vol_brought_unit
 * @property string|null $date_brought
 * @property string|null $time_brought
 * @property string|null $lab_tech_ini
 * @property string|null $csf_venesector
 * @property string|null $remarks
 * @property string|null $rejected_reason
 * @property string|null $reason_not_collected
 * @property string|null $date_collect Date the sample was collected.
 * @property string|null $time_collect Time the sample was collected
 * @property string|null $creation_time Time this record was created.
 * @property string|null $creation_name AD username of record creator.
 * @property string|null $sample_collected Whether or not the sample has been received or received and rejected.
 * @property string|null $date_created date record created
 * @property string $date_modified
 * @property string|null $urine_dipstick
 * @property string|null $reject_specify
 * @property string|null $time_point
 * @property string|null $sample_collection_dtl sample collection details upon collecting from site.
 * @property string|null $sample_receive_status status of sample at reception. this should be enumerated.
 * @property string|null $gram_stain
 */
class LabSample extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lab_sample';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fk_specimen'], 'integer'],
            [['vol_brought'], 'number'],
            [['date_brought', 'time_brought', 'date_collect', 'time_collect', 'creation_time', 'date_created', 'date_modified'], 'safe'],
            [['remarks', 'sample_collected', 'urine_dipstick', 'sample_collection_dtl', 'gram_stain'], 'string'],
            [['fk_patient'], 'string', 'max' => 45],
            [['specimen_source', 'sample_designation', 'originated_from', 'csf_venesector', 'creation_name'], 'string', 'max' => 50],
            [['adm_sample'], 'string', 'max' => 1],
            [['vol_brought_unit', 'time_point'], 'string', 'max' => 30],
            [['lab_tech_ini'], 'string', 'max' => 20],
            [['rejected_reason', 'reason_not_collected'], 'string', 'max' => 500],
            [['reject_specify'], 'string', 'max' => 200],
            [['sample_receive_status'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fk_specimen' => 'Fk Specimen',
            'fk_patient' => 'Fk Patient',
            'specimen_source' => 'Specimen Source',
            'adm_sample' => 'Adm Sample',
            'sample_designation' => 'Sample Designation',
            'originated_from' => 'Originated From',
            'vol_brought' => 'Vol Brought',
            'vol_brought_unit' => 'Vol Brought Unit',
            'date_brought' => 'Date Brought',
            'time_brought' => 'Time Brought',
            'lab_tech_ini' => 'Lab Tech Ini',
            'csf_venesector' => 'Csf Venesector',
            'remarks' => 'Remarks',
            'rejected_reason' => 'Rejected Reason',
            'reason_not_collected' => 'Reason Not Collected',
            'date_collect' => 'Date Collect',
            'time_collect' => 'Time Collect',
            'creation_time' => 'Creation Time',
            'creation_name' => 'Creation Name',
            'sample_collected' => 'Sample Collected',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'urine_dipstick' => 'Urine Dipstick',
            'reject_specify' => 'Reject Specify',
            'time_point' => 'Time Point',
            'sample_collection_dtl' => 'Sample Collection Dtl',
            'sample_receive_status' => 'Sample Receive Status',
            'gram_stain' => 'Gram Stain',
        ];
    }
}
