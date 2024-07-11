<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_reason_services".
 *
 * @property int $id
 * @property string|null $services
 */
class ReasonServices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_reason_services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['services'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'services' => 'Services',
        ];
    }
}
