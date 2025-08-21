<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model{
    public $username;
    public $password;
    public $rememberMe = true;

    public function rules(){
        return [
            ['username', 'required'],
            ['password', 'required'],
        ];
    }

    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if ($user && $user->validatePassword($this->password)) {
                return Yii::$app->user->login($user);
            }
            $this->addError('password', 'Wrong username or password.');
        }
        return false;
    }

    public function getUser(){
        return User::findByUsername($this->username);
    }
}
