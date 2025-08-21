<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegisterForm;
use app\models\Todo;
use Yii;
use yii\web\Controller;

class TodoController extends Controller
{
    public function actionIndex()
    {
        $todos = Todo::find()->where(['id_user' => Yii::$app->user->id])->all();
        return $this->render('index', [
            'todos' => $todos,
        ]);
    }
    public function actionCreate()
    {
        $todo = new Todo();
        if ($todo->load(Yii::$app->request->post()) && $todo->save()) {
            return $this->redirect(['todo/index']);
        }

        return $this->render('create', [
            'model' => $todo,
        ]);
    }

}