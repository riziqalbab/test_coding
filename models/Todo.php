<?php


namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Todo extends ActiveRecord
{
    public static function tableName()
    {
        return 'todos';
    }

    // rules validasi
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['id_user', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->id_user = Yii::$app->user->id;
                $this->created_at = time();
            }
            $this->updated_at = time();
            return true;
        }
        return false;
    }
}
