<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\RegisterForm;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout = FALSE;

        return parent::beforeAction($action);
    }


    public function actionLogin()
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new RegisterForm();

        if ($model->load(Yii::$app->request->post()) && $user = $model->register()) {
            Yii::$app->user->login($user);
            return $this->goHome();
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }
}

