<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Login - The Story Sage</title>
  <link href="<?=ROOT?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=ROOT?>/assets/css/sign-in.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">
  <main class="form-signin w-100 m-auto">
    <form method="post">
      <h1 class="h3 mb-3 fw-bold text-center">The Story Sage</h1>
      <h1 class="h6 mb-3 fw-normal text-center">Please Login</h1>
      <div class="form-floating mb-3">
        <input name="email" type="email" class="form-control rounded" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <div class="form-check text-start my-3">
        <input name="remember" class="form-check-input" type="checkbox" value="1" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-dark w-100 py-2" type="submit">Login</button>
    </form>
    <div class="text-center my-2">Dont't have an Account? <a href="signup">Sign Up</a></div>
  </main>
  <script src="<?=ROOT?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>