<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
  <div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 420px;">
      <h3 class="text-center mb-3">Create Account</h3>

      <form method="post" action="/auth/register">
        <!-- CSRF token Yii -->
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

        <div class="mb-3">
          <label class="form-label" for="username">Username</label>
          <input id="username" name="RegisterForm[username]" class="form-control" type="text" required>
        </div>

        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input id="password" name="RegisterForm[password]" class="form-control" type="password" minlength="6" required>
          <div class="form-text">Min 6 chars.</div>
        </div>

        <button class="btn btn-primary w-100" type="submit">Register</button>
      </form>

      <p class="text-center mt-3 mb-0">Already have an account? <a href="/auth/login">Login</a></p>
    </div>
  </div>
</body>
</html>
