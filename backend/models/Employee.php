<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $auth_key
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */

class Employee extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public  $password;
    private $_user;
    public $rememberMe = true;
    public static function tableName()
    {
        return 'employee';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
   
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'auth_key', 'created_at', 'updated_at','password'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'auth_key'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['password_reset_token'], 'unique'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tài khoản',
            'password_hash' => 'Mật khẩu',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Thời gian tạo',
            'updated_at' => 'Cập nhật',
            'password' =>'Mật khẩu'
        ];
    }
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
        return true;
    }
    public function getUsername()
    {
        return \Yii::$app->user->identity->username;
    }
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }
    public function validatePasswords($attribute)
    {
        
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || $user->getPassword() != $this->password) {
                $this->addError('password', 'Sai tên đăng nhập hoặc tài khoản');
                return false;
            }
            return true;
        }
        return false;
    }
    
    public function login()
    {           
        if ($this->validatePasswords($this->password)) {
            return  Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);;
        }        
        return false;

        
    }
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = $this->findByUsername($this->username);
        }

        return $this->_user;
    }
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => 10]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     * @return static|null
     */
    public static function findByVerificationToken($token) {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    public function getPassword(){
        return $this->password_hash;
    }
    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
}
