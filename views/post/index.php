<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->identity->isAdmin() || Yii::$app->user->identity->isAuthor())): ?>
        <p>
            <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpost',
            'title:ntext',
            [
                'attribute' => 'content',
                'format' => 'ntext',
                'value' => function($model) {
                    return substr($model->content, 0, 100) . '...';
                }
            ],
            'date:datetime',
            [
                'attribute' => 'username',
                'label' => 'Author',
                'value' => function($model) {
                    return $model->author ? $model->author->name : $model->username;
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        $user = Yii::$app->user->identity;
                        if ($user && ($user->isAdmin() || $model->username === $user->username)) {
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => 'Update',
                                'class' => 'btn btn-sm btn-primary'
                            ]);
                        }
                        return '';
                    },
                    'delete' => function ($url, $model, $key) {
                        $user = Yii::$app->user->identity;
                        if ($user && ($user->isAdmin() || $model->username === $user->username)) {
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => 'Delete',
                                'class' => 'btn btn-sm btn-danger',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                        return '';
                    },
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>