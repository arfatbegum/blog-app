<?php

if (!logged_in()) {
  redirect('login');
}


$section  = $url[1] ?? 'dashboard';
$action   = $url[2] ?? 'view';
$id       = $url[3] ?? 0;

$filename = "../app/pages/admin/" . $section . ".php";
if (!file_exists($filename)) {
  $filename = "../app/pages/admin/404.php";
}

if ($section == 'users') {
  require_once "../app/pages/admin/users-controller.php";
} else if ($section == 'categories') {
  require_once "../app/pages/admin/categories-controller.php";
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <title>Admin - The Story Sage</title>

  <link href="<?= ROOT ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

  <!-- Custom styles for this template -->
  <link href="<?= ROOT ?>/assets/css/dashboard.css" rel="stylesheet">
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand bg-dark col-md-3 col-lg-2 me-0 px-3 fs-6 text-center text-uppercase fw-bold" href="/"> The Story Sage</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="input-group p-3">
      <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
      <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3 text-white bg-dark" href="<?= ROOT ?>/logout">Log out</a>
      </div>
    </div>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="<?= ROOT ?>/admin">
                <i class="bi bi-flower3 fs-6"></i>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="<?= ROOT ?>/admin/users">
                <i class="bi bi-person fs-6"></i>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="<?= ROOT ?>/admin/categories">
                <i class="bi bi-tags fs-6"></i>
                Categories
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark" aria-current="page" href="<?= ROOT ?>/admin/posts">
                <i class="bi bi-journal-text fs-6"></i>
                Posts
              </a>
            </li>
          </ul>

          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>OTHER</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link text-dark" href="<?= ROOT ?>">
                <i class="bi bi-house fs-6"></i>
                Home
              </a>
            </li>

          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <?php
        require_once $filename;
        ?>

      </main>
    </div>
  </div>


  <script src="<?= ROOT ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>