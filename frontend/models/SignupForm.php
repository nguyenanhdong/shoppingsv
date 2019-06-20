<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $phone;
    public $password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required','message'=>'{attribute} không được để trống'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Tài khoản đã tồn tại.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required','message'=>'{attribute} không được để trống'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email đã tồn tại.'],
            
            ['phone', 'trim'],
            ['phone', 'required','message'=>'{attribute} không được để trống'],
            ['phone', 'string', 'min' => 9, 'max' => 11],
            ['phone', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Số điện thoại đã được sử dụng bởi tài khoản khác.'],

            ['password', 'required','message'=>'{attribute} không được để trống'],
            ['password', 'string', 'min' => 6],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Tài khoản',
            'password' => 'Mật khẩu',
            'phone' => 'Số điện thoại',
            
        ];
    }
    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        return $user->save() && $this->sendEmail($user);

    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}
