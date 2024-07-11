<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "radiology".
 *
 * @property int $id
 * @property string $radiology_type_id
 * @property string|null $radiology_type
 *
 * @property RadilogyRequest[] $radilogyRequests
 */
class Radiology extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'radiology';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['radiology_type_id'], 'required'],
            [['radiology_type_id', 'radiology_type'], 'string', 'max' => 45],
            [['radiology_type_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'radiology_type_id' => 'Radiology Type ID',
            'radiology_type' => 'Radiology Type',
        ];
    }

    /**
     * Gets query for [[RadilogyRequests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRadilogyRequests()
    {
        return $this->hasMany(RadilogyRequest::class, ['radiology_type' => 'radiology_type_id']);
    }
}
