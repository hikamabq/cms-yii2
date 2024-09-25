<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ForgotForm extends Model
{
    public $email;
    public $username;
    public $password_baru;
    public $konfirmasi_password;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['username', 'password_baru', 'konfirmasi_password'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            ['konfirmasi_password', 'compare', 'compareAttribute' => 'password_baru', 'message' => "Passwords don't match" ]
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'email',
            'password_baru' => 'Password Baru',
            'konfirmasi_password' => 'Konfirmasi Password',
        ];
    }
}
