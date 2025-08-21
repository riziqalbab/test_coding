<?php
use yii\helpers\Html;
?>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
          <h4 class="mb-0">My Todo List</h4>
          <?= Html::a('Create Todo', ['todo/create'], ['class' => 'btn btn-light btn-sm']) ?>
        </div>
        <div class="card-body p-0">
          <?php if (!empty($todos)): ?>
            <ul class="list-group list-group-flush">
              <?php foreach ($todos as $todo): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                  <div>
                    <strong><?= Html::encode($todo->title) ?></strong><br>
                    <small class="text-muted"><?= nl2br(Html::encode($todo->description)) ?></small>
                  </div>
                  <span class="badge bg-secondary">
                    <?= date('d M Y H:i', $todo->created_at) ?>
                  </span>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php else: ?>
            <div class="p-4 text-center text-muted">
              No todos yet. <?= Html::a('Create one', ['todo/create']) ?>.
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
