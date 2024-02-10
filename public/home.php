<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home · Bootstrap v5.3</title>

    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <!-- Custom styles for this template -->
    <link href="assets/css/headers.css" rel="stylesheet">
</head>

<body>
    <main>
        <!-- header -->
        <header class="p-3 border-bottom bg-dark">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="h5 text-white fw-bold pt-1 text-decoration-none">
                        The Story Sage
                    </a>

                    <ul class="nav ms-4 col-12 col-lg-auto me-lg-auto mb-2 justify-content-center text-white mb-md-0">
                        <li><a href="#" class="nav-link px-2 link-body-emphasis text-white">Post</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis text-white">Customers</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis text-white">Contact</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                    </form>

                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle text-white" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://static.vecteezy.com/system/resources/thumbnails/024/095/208/small/happy-young-man-smiling-free-png.png" alt="mdo" width="32" height="32" class="rounded-circle">
                        </a>
                        <ul class="dropdown-menu text-small">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Log out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <!-- carousel -->
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="assets/images/carousel-image-3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-dark text-white p-4">
                        <i class="bi bi-quote h1"></i>
                        <h5 class="mt-2 fw-bold">Discover the World Through Words: Your Ultimate Blogging Destination</h5>
                        <p>Immerse yourself in a world of captivating narratives, insightful perspectives, and engaging discussions. Explore diverse topics, share your stories, and connect with a global community of passionate bloggers on our vibrant platform.</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="assets/images/carousel-image-2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-dark text-white p-4">
                        <i class="bi bi-quote h1"></i>
                        <h5 class="mt-2 fw-bold">Unleash Your Creativity: Where Ideas Meet Expression</h5>
                        <p>Ignite your creativity and unleash your imagination on our dynamic blogging platform. From thought-provoking articles to creative endeavors, our space is your canvas to express, inspire, and innovate. Join a supportive community and let your voice be heard.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/images/carousel-image-1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block bg-dark text-white p-4">
                        <i class="bi bi-quote h1"></i>
                        <h5 class="mt-2 fw-bold">Empower Your Voice: Amplify Your Impact with Our Blogging Community</h5>
                        <p>Empower yourself and others through the power of words. Join a community of like-minded individuals dedicated to making a difference. Whether you're sharing personal experiences, advocating for change, or exploring new horizons, our platform is your launchpad to amplify your voice and effect positive change.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- footer -->
        <div class="container">
            <footer class="py-5">
                <div class="row">
                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-md-2 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Features</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Pricing</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5>Subscribe to our newsletter</h5>
                            <p>Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-dark" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
                <p class="text-center border-top pt-4">&copy; 2023 Company, Inc. All rights reserved.</p>
            </footer>
        </div>
    </main>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>