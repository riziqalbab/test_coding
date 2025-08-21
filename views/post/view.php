<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest): ?>
        <?php $user = Yii::$app->user->identity; ?>
        <?php if ($user->isAdmin() || $model->username === $user->username): ?>
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->idpost], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->idpost], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        <?php endif; ?>
    <?php endif; ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpost',
            'title:ntext',
            'content:ntext',
            'date:datetime',
            [
                'attribute' => 'username',
                'label' => 'Author',
                'value' => $model->author ? $model->author->name : $model->username,
            ],
        ],
    ]) ?>

</div>