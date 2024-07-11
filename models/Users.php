<?php

namespace app\models;
use borales\extensions\phoneInput\PhoneInputValidator;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $user_id
 * @property string|null $username
 * @property string|null $email
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone_no
 * @property string|null $address
 * @property string|null $password
 * @property string|null $role
 * @property string|null $department
 * @property int|null $status
 * @property string|null $authoKey
 * @property string|null $accessToken
 * @property string|null $profile_pictucre
 * @property string|null $oldpassword
 * @property string|null $newpassword
 * @property string|null $confirm_pass
 *
 * @property Departments $department0
 * @property Roles $role0
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_ACTIVE = 2;
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE, self::STATUS_DELETED]],
            [['status'], 'integer'],
            [['password'], 'validatePasswordStrength'],
            [['newpassword'], 'validatePasswordNew'],
            [['phone_no'], PhoneInputValidator::className()],
            [['confirm_pass'], 'compare', 'compareAttribute' => 'newpassword', 'message' => "Passwords don't match"],
            [['user_id', 'username', 'email', 'first_name', 'last_name', 'phone_no', 'address', 'role', 'department', 'authoKey', 'accessToken'], 'string', 'max' => 45],
            [['password', 'profile_pictucre', 'oldpassword', 'newpassword', 'confirm_pass'], 'string', 'max' => 100],
            [['department'], 'exist', 'skipOnError' => true, 'targetClass' => Departments::class, 'targetAttribute' => ['department' => 'name']],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['role' => 'slug']],
            [['confirm_pass'], 'compare', 'compareAttribute' => 'newpassword', 'message' => "Passwords don't match"],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'email' => 'Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_no' => 'Phone No',
            'address' => 'Address',
            'password' => 'Password',
            'role' => 'Role',
            'department' => 'Department',
            'status' => 'Status',
            'authoKey' => 'Autho Key',
            'accessToken' => 'Access Token',
            'profile_pictucre' => 'Profile Pictucre',
            'oldpassword' => 'Oldpassword',
            'newpassword' => 'Newpassword',
            'confirm_pass' => 'Confirm Pass',
        ];
    }

    /**
     * Gets query for [[Department0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment0()
    {
        return $this->hasOne(Departments::class, ['name' => 'department']);
    }

    /**
     * Gets query for [[Role0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Roles::class, ['slug' => 'role']);
    }

    //password validation
    public function validatePasswordStrength($attribute, $params)
    {
        // Perform custom password strength validation
        $password = $this->$attribute;

        // Add your custom password validation logic here
        // For example, you can check if the password has a minimum length, contains special characters, etc.

        if (!preg_match('/[!@#$%^&*]/', $password)) {
            $this->addError($attribute, 'The password must contain at least one special character.');
        }

        if (strlen($password) < 8) {
            $this->addError($attribute, 'The password must be at least 8 characters long.');
        }
        return  $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    public function validatePasswordNew($attribute, $params)
    {
        $newpassword = $this->$attribute;

        if (!preg_match('/[!@#$%^&*]/', $newpassword)) {
            $this->addError($attribute, 'The password must contain at least one special character.');
        }

        if (!preg_match('/[0-9]/', $newpassword)) {
            $this->addError($attribute, 'The password must contain at least one digit.');
        }

        if (!preg_match('/[a-z]/', $newpassword)) {
            $this->addError($attribute, 'The password must contain at least one lowercase letter.');
        }

        if (!preg_match('/[A-Z]/', $newpassword)) {
            $this->addError($attribute, 'The password must contain at least one uppercase letter.');
        }
    }
    public function generateAuthKey()
    {
        $this->authoKey = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }
    public function getProfilePictureFile()
    {
        return isset($this->profile_picture) ? Yii::$app->params['uploadPath'] . 'web/assets/profile/' . $this->profile_picture : null;
    }

    public function getProfilePictureUrl()
    {
        // return a default image placeholder if your source profile_pic is not found
        $profile_picture = isset($this->profile_picture) ? $this->profile_picture : 'default_user.jpg';
        return Yii::$app->params['uploadUrl'] . 'web/assets/profile/' . $profile_picture;
    }


}