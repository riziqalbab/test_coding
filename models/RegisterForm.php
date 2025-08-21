<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['username', 'string', 'min' => 4, 'max' => 50],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Username sudah dipakai'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->created_at = time();
            $user->updated_at = time();

            return $user->save() ? $user : null;
        }
        return null;
    }

}
