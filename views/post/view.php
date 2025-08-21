<?php

use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-view container">
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h1 class="card-title"><?= Html::encode($this->title) ?></h1>
            <p class="text-muted mb-2">
                <small>
                    <strong>Author:</strong> <?= $model->author ? Html::encode($model->author->name) : Html::encode($model->username) ?> 
                    | <strong>Date:</strong> <?= Yii::$app->formatter->asDatetime($model->date) ?>
                </small>
            </p>
            <hr>
            <div class="card-text">
                <?= nl2br(Html::encode($model->content)) ?>
            </div>
        </div>
        <?php if (!Yii::$app->user->isGuest): ?>
            <?php $user = Yii::$app->user->identity; ?>
            <?php if ($user->isAdmin() || $model->username === $user->username): ?>
                <div class="card-footer text-end">
                    <?= Html::a('Update', ['update', 'id' => $model->idpost], ['class' => 'btn btn-primary btn-sm']) ?>
                    <?= Html::a('Delete', ['delete', 'id' => $model->idpost], [
                        'class' => 'btn btn-danger btn-sm',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</div>
