<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    // Define the table name
    public static function tableName()
    {
        return 'users';
    }

    // Implement the IdentityInterface methods

    // Find a user by ID
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    // Find a user by access token (e.g., for API authentication)
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    // Get the user's ID
    public function getId()
    {
        return $this->id;
    }

    // Get the user's auth key (used for "remember me" functionality)
    public function getAuthKey()
    {
        return $this->authoKey; // Corrected the property name to "authoKey"
    }

    // Validate the auth key
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    // Find a user by username (used for login)
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    // Validate the user's password
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}