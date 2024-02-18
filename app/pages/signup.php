<?php

if (!empty($_POST)) {
  //validate
  $errors = [];

  if (empty($_POST['username'])) {
    $errors['username'] = "Username is required";
  } else
    if (!preg_match("/^[a-zA-Z]+$/", $_POST['username'])) {
    $errors['username'] = "Username can only have letters and no spaces";
  }

  $query = "select id from users where email = :email limit 1";
  $email = query($query, ['email' => $_POST['email']]);

  if (empty($_POST['email'])) {
    $errors['email'] = "Email is required";
  } else
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email not valid";
  } else
    if ($email) {
    $errors['email'] = "Email is already exist";
  }

  if (empty($_POST['password'])) {
    $errors['password'] = "Password is required";
  } else
    if (strlen($_POST['password']) < 8) {
    $errors['password'] = "Password must be 8 character or more";
  } else
    if ($_POST['password'] !== $_POST['retype_password']) {
    $errors['password'] = "Passwords do not match";
  }

  if (empty($_POST['terms'])) {
    $errors['terms'] = "Please accept the terms";
  }

  if (empty($errors)) {
    //save to database
    $data = [];
    $data['username'] = $_POST['username'];
    $data['email']    = $_POST['email'];
    $data['role']     = "user";
    $data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "insert into users (username,email,password,role) values (:username,:email,:password,:role)";
    query($query, $data);

    redirect('login');
  }
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Sign Up - The Story Sage</title>
  <link href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?= ROOT ?>/assets/css/sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">
    <form method="post">
      <h1 class="h3 mb-3 fw-bold text-center">The Story Sage</h1>
      <h1 class="h6 mb-3 fw-normal text-center">Create An Account</h1>
      <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">Please fix the errors below</div>
      <?php endif; ?>
      <div class="form-floating mb-3">
        <input value="<?= old_value('username') ?>" name="username" type="username" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Username</label>
      </div>
      <?php if (!empty($errors['username'])) : ?>
        <div class="text-danger mb-2"><?= $errors['username'] ?></div>
      <?php endif; ?>
      <div class="form-floating mb-3">
        <input value="<?= old_value('email') ?>" name="email" type="email" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <?php if (!empty($errors['email'])) : ?>
        <div class="text-danger mb-2"><?= $errors['email'] ?></div>
      <?php endif; ?>
      <div class="form-floating mb-3">
        <input value="<?= old_value('password') ?>" name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <?php if (!empty($errors['password'])) : ?>
        <div class="text-danger mb-2"><?= $errors['password'] ?></div>
      <?php endif; ?>
      <div class="form-floating">
        <input value="<?= old_value('retype_password') ?>" name="retype_password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="checkbox mb-3">
        <label>
          <input <?= old_checked('terms') ?> name="terms" type="checkbox" value="remember-me"> Accept terms and conditions
        </label>
      </div>
      <?php if (!empty($errors['terms'])) : ?>
        <div class="text-danger mb-3"><?= $errors['terms'] ?></div>
      <?php endif; ?>
      <button class="btn btn-dark  w-100 py-2" type="submit">Create</button>
    </form>
    <div class="text-center my-2">Already have an Account? <a href="login.php">Login</a></div>
  </main>
  <script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>