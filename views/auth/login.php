<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">



<?php
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
?>

<div class="container d-flex justify-content-center align-items-center vh-100">
  <div class="card shadow p-4" style="width: 350px;">
    <h3 class="text-center mb-4"><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>

        <?= $form->field($model, 'username')
            ->textInput(['placeholder' => 'Enter username', 'autofocus' => true])
            ->label('Username') ?>

        <?= $form->field($model, 'password')
            ->passwordInput(['placeholder' => 'Password'])
            ->label('Password') ?>

        <div class="d-grid">
          <?= Html::submitButton('Login', ['class' => 'btn btn-primary w-100']) ?>
        </div>

    <?php ActiveForm::end(); ?>

    <p class="text-center mt-3 mb-0">
      Don't have an account? <a href="<?= \yii\helpers\Url::to(['auth/register']) ?>">Register</a>
    </p>
  </div>
</div>
