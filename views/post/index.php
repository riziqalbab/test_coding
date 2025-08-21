<?php

use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="post-index container">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->isAdmin() || Yii::$app->user->identity->isAuthor())): ?>
        <p>
            <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>

    <div class="row">
        <?php foreach ($dataProvider->models as $model): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= Html::a(Html::encode($model->title), ['view', 'id' => $model->idpost], ['class' => 'text-decoration-none']) ?>
                        </h5>
                        <p class="card-text">
                            <?= Html::encode(substr($model->content, 0, 120)) ?>...
                        </p>
                    </div>
                    <div class="card-footer text-muted small">
                        <span>By
                            <?= $model->author ? Html::encode($model->author->name) : Html::encode($model->username) ?></span>
                        | <span><?= Yii::$app->formatter->asDatetime($model->date) ?></span>
                        <div class="mt-2">
                            <?= Html::a('View', ['view', 'id' => $model->idpost], ['class' => 'btn btn-sm btn-outline-secondary']) ?>
                            <?php $user = Yii::$app->user->identity; ?>
                            <?php if ($user && ($user->isAdmin() || $model->username === $user->username)): ?>
                                <?= Html::a('Update', ['update', 'id' => $model->idpost], ['class' => 'btn btn-sm btn-primary']) ?>
                                <?= Html::a('Delete', ['delete', 'id' => $model->idpost], [
                                    'class' => 'btn btn-sm btn-danger',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php Pjax::end(); ?>
</div>