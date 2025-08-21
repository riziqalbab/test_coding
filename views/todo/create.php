<?php
use yii\helpers\Html;
?>

<div class="container py-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow">
        <div class="card-header bg-primary text-white">
          <h4 class="mb-0">Create Todo</h4>
        </div>
        <div class="card-body">

          <form method="post" action="">
            <!-- CSRF Token -->
            <input type="hidden" 
                   name="<?= Yii::$app->request->csrfParam ?>" 
                   value="<?= Yii::$app->request->getCsrfToken() ?>">

            <div class="mb-3">
              <label for="title" class="form-label">Title</label>
              <input type="text" id="title" name="Todo[title]" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea id="description" name="Todo[description]" rows="4" class="form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-success w-100">Save</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
