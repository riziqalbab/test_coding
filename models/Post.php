<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
    public static function tableName()
    {
        return 'post';
    }
    
    public function rules()
    {
        return [
            [['title', 'content', 'username'], 'required'],
            ['title', 'string'],
            ['content', 'string'],
            ['username', 'string', 'max' => 45],
            ['username', 'exist', 'targetClass' => User::class, 'targetAttribute' => 'username'],
        ];
    }

    public function beforeSave($insert)
    {
        if ($insert) {
            $this->date = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }

    public function getAuthor()
    {
        return $this->hasOne(User::class, ['username' => 'username']);
    }

    public function attributeLabels()
    {
        return [
            'idpost' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'date' => 'Date',
            'username' => 'Author',
        ];
    }
}
