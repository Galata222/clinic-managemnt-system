<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_admission_examination".
 *
 * @property int $id
 * @property string|null $fk_patient_id
 * @property float|null $hrs
 * @property float|null $rr
 * @property float|null $systolic
 * @property float|null $diastolic
 * @property float|null $systolic2
 * @property float|null $diastolic2
 * @property float|null $temp
 * @property float|null $weight
 * @property float|null $height
 * @property float|null $muac
 * @property float|null $heightfundus
 * @property int|null $descent
 * @property float|null $cervix
 * @property int|null $abdoscar
 * @property int|null $fhr
 * @property int|null $mraptured
 * @property string|null $timerom
 * @property int|null $liquor
 * @property string|null $ve_findings
 * @property int|null $admited
 * @property int|null $rswab
 * @property string|null $rswabreason
 * @property string|null $tswab
 * @property string|null $examinitials
 * @property string|null $date_exam
 * @property string|null $created_by
 * @property string|null $date_created
 * @property string|null $modified_by
 * @property string|null $date_modified
 * @property string|null $rom_duration_days
 * @property string|null $rom_duration_hrs
 * @property int|null $fhr_not_done
 * @property int|null $pres
 * @property string|null $admitted_by
 * @property int|null $position Left OA(LOA), Right OA(ROA)
 * @property string|null $abnormalities
 * @property string|null $spleen
 * @property string|null $extgenitals
 * @property string|null $vdischarge
 * @property string|null $tpr
 * @property int|null $fk_temp
 * @property int|null $fw_ini
 * @property int|null $status
 *
 * @property Patient $fkPatient
 */
class AdmissionExamination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_admission_examination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hrs', 'rr', 'systolic', 'diastolic', 'systolic2', 'diastolic2', 'temp', 'weight', 'height', 'muac', 'heightfundus', 'cervix'], 'number'],
            [['descent', 'abdoscar', 'fhr', 'mraptured', 'liquor', 'admited', 'rswab', 'fhr_not_done', 'pres', 'position', 'fk_doctor', 'fw_ini', 'status'], 'integer'],
            [['timerom', 'tswab', 'date_exam', 'date_created', 'date_modified'], 'safe'],
            [['fk_patient_id', 'admitted_by'], 'string', 'max' => 45],
            [['ve_findings'], 'string', 'max' => 455],
            [['rswabreason', 'examinitials', 'rom_duration_days', 'rom_duration_hrs', 'tpr'], 'string', 'max' => 20],
            [['created_by', 'modified_by'], 'string', 'max' => 30],
            [['abnormalities', 'spleen', 'extgenitals', 'vdischarge'], 'string', 'max' => 345],
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
            'hrs' => 'Hrs',
            'rr' => 'Rr',
            'systolic' => 'Systolic',
            'diastolic' => 'Diastolic',
            'systolic2' => 'Systolic2',
            'diastolic2' => 'Diastolic2',
            'temp' => 'Temp',
            'weight' => 'Weight',
            'height' => 'Height',
            'muac' => 'Muac',
            'heightfundus' => 'Heightfundus',
            'descent' => 'Descent',
            'cervix' => 'Cervix',
            'abdoscar' => 'Abdoscar',
            'fhr' => 'Fhr',
            'mraptured' => 'Mraptured',
            'timerom' => 'Timerom',
            'liquor' => 'Liquor',
            've_findings' => 'Ve Findings',
            'admited' => 'Admited',
            'rswab' => 'Rswab',
            'rswabreason' => 'Rswabreason',
            'tswab' => 'Tswab',
            'examinitials' => 'Examinitials',
            'date_exam' => 'Date Exam',
            'created_by' => 'Created By',
            'date_created' => 'Date Created',
            'modified_by' => 'Modified By',
            'date_modified' => 'Date Modified',
            'rom_duration_days' => 'Rom Duration Days',
            'rom_duration_hrs' => 'Rom Duration Hrs',
            'fhr_not_done' => 'Fhr Not Done',
            'pres' => 'Pres',
            'admitted_by' => 'Admitted By',
            'position' => 'Position',
            'abnormalities' => 'Abnormalities',
            'spleen' => 'Spleen',
            'extgenitals' => 'Extgenitals',
            'vdischarge' => 'Vdischarge',
            'tpr' => 'Tpr',
            'fK_doctor' => 'Doctor ID',
            'fw_ini' => 'Fw Ini',
            'status' => 'Status',
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