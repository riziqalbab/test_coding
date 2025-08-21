<?php

/** @var yii\web\View $this */
/** @var app\models\User $user */

use yii\helpers\Html;

$this->title = 'Beranda';
?>

<div class="site-index">

    <div class="jumbotron text-center bg-transparent mt-5 mb-5">
        <h1 class="display-4">Selamat Datang!</h1>

        <?php if (!Yii::$app->user->isGuest): ?>
            <p class="lead">Halo, <?= Html::encode($user->name) ?>!</p>
            <p>Role Anda: <strong><?= Html::encode(ucfirst($user->role)) ?></strong></p>
        <?php else: ?>
            <p class="lead">Silakan login untuk mengakses fitur aplikasi.</p>
            <p><a class="btn btn-lg btn-primary"
                   href="<?= \yii\helpers\Url::to(['/site/login']) ?>">Login</a></p>
        <?php endif; ?>
    </div>



    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="body-content">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <h2>Posts</h2>
                    <p>Lihat dan kelola semua posts yang tersedia. Semua user dapat melihat posts, namun hanya Admin dan
                        Author yang dapat membuat posts baru.</p>
                    <p><a class="btn btn-outline-secondary"
                           href="<?= \yii\helpers\Url::to(['/post/index']) ?>">Lihat Posts &raquo;</a></p>
                </div>

                <?php if (!Yii::$app->user->isGuest && $user->isAdmin()): ?>
                    <div class="col-lg-4 mb-3">
                        <h2>Akun</h2>
                        <p>Kelola akun pengguna. Fitur ini hanya tersedia untuk Admin untuk membuat, mengubah, dan menghapus
                            akun pengguna.</p>
                        <p><a class="btn btn-outline-secondary"
                               href="<?= \yii\helpers\Url::to(['/account/index']) ?>">Kelola Akun &raquo;</a></p>
                    </div>
                <?php endif; ?>

                <?php if (!Yii::$app->user->isGuest && ($user->isAdmin() || $user->isAuthor())): ?>
                    <div class="col-lg-4">
                        <h2>Buat Post</h2>
                        <p>Buat post baru untuk dibagikan. Admin dan Author dapat membuat posts baru dan mengelola posts mereka
                            sendiri.</p>
                        <p><a class="btn btn-outline-secondary"
                               href="<?= \yii\helpers\Url::to(['/post/create']) ?>">Buat Post &raquo;</a></p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (Yii::$app->user->isGuest): ?>

        <div class="row">
            <?php foreach ($posts as $post): ?>
                <div class="col-lg-4 mb-3">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post->title ?></h5>
                            <p class="card-text"><?= $post->content ?></p>
                        </div>
                        <div class="card-footer text-end">
                            <a href="<?= \yii\helpers\Url::to(['/post/view', 'id' => $post->idpost]) ?>"
                               class="btn btn-primary btn-sm">Read more</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    <?php endif; ?>
</div>