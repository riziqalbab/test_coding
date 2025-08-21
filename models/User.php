<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'account';
    }

    public function rules()
    {
        return [
            [['username', 'password', 'name'], 'required'],
            ['username', 'unique'],
            ['username', 'string', 'max' => 45],
            ['password', 'string', 'max' => 250],
            ['name', 'string', 'max' => 45],
            ['role', 'in', 'range' => ['admin', 'author', 'user']],
            ['role', 'default', 'value' => 'user']
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert || $this->isAttributeChanged('password')) {
            if (!empty($this->password)) {
                $this->password = Yii::$app->security->generatePasswordHash($this->password);
            }
        }
        return parent::beforeSave($insert);
    }

    public static function findIdentity($id)
    {
        return static::findOne(['username' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return true;
    }

    public function getId()
    {
        return $this->username;
    }

    public function getAuthKey()
    {
        return $this->username;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getPosts()
    {
        return $this->hasMany(Post::class, ['username' => 'username']);
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isAuthor()
    {
        return $this->role === 'author';
    }
}
