<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => $model->isNewRecord ? '' : 'Leave empty to keep current password']) ?>

    <?= $form->field($model, 'role')->dropDownList([
        'admin' => 'Admin',
        'author' => 'Author',
    ], ['prompt' => 'Select Role']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>