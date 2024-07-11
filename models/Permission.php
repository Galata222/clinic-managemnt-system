<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_permission".
 *
 * @property string $id
 * @property string|null $task
 * @property string|null $fk_roles
 *
 * @property Roles $fkRoles
 */
class Permission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_permission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'task', 'fk_roles'], 'string', 'max' => 45],
            [['id'], 'unique'],
            [['fk_roles'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['fk_roles' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task' => 'Task',
            'fk_roles' => 'Fk Roles',
        ];
    }

    /**
     * Gets query for [[FkRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkRoles()
    {
        return $this->hasOne(Roles::class, ['id' => 'fk_roles']);
    }
}
