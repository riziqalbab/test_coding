<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php if (Yii::$app->user->identity->isAdmin()): ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?php else: ?>
        <?= $form->field($model, 'username')->hiddenInput()->label(false) ?>
        <div class="form-group">
            <label>Author</label>
            <p class="form-control-static"><?= Html::encode(Yii::$app->user->identity->name) ?></p>
        </div>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Cancel', ['index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>