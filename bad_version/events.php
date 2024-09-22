<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=African_Lantern', 'root', '');

$result = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$form_errors = [];
$newsletter_errors = [];
$success = [];
$first_name = '';
$middle_name = '';
$last_name = '';
$email = '';
$password = '';
$category = '';
$student = '';
$volunteer = '';
$newsletter_Email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # code...

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $category = $_POST['category'];
    $date = date('Y-m-d H:m:s');

    if (!$first_name) {
        $form_errors[] = 'Input your name';
    }

    if (!$middle_name) {
        $form_errors[] = 'Input your middle name';
    }

    if (!$last_name) {
        $form_errors[] = 'Input your last name';
    }

    if (!$email) {
        $form_errors[] = 'Input your Email';
    }
    if (!$password) {
        $form_errors[] = 'Input your Password';
    }
    if (!$category) {
        $form_errors[] = 'Selct your category';
    }




    if (!empty($first_name) && !empty($last_name) && !empty($middle_name) && !empty($email) && !empty($password) && !empty($category)) {
        # code...


        $statement = $pdo->prepare("INSERT INTO enrollment (first_name, middle_name, last_name, email, password, category, create_date)
     VALUES(:first_name, :middle_name, :last_name, :email, :password, :category, :date) #Insert into products these values");

        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':middle_name', $middle_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':category', $category);
        $statement->bindValue(':date', $date);
        $statement->execute();

        $success[] = "Successfully submitted into the database";
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    # code...

    $newsletter_Email = $_GET['newsletter'] ?? null;
    $date = date('Y-m-d H:m:s');

    if (!$newsletter_Email) {
        $newsletter_errors[] = 'Input your email';
    }
    if (!empty($newsletter_Email)) {
        $statement = $pdo->prepare("INSERT INTO newsletter (email, create_date) VALUE (:newsletter, :date )");
        $statement->bindValue(':newsletter', $newsletter_Email);
        $statement->bindValue(':date', $date);
        $statement->execute();
    }
}


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/bootstrap-5.0.2-dist/css/
        bootstrap.css">
    <!-- Carousel css -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Lantern Initiatives</title>
</head>

<body>


    <!-- Nav section -->
    <nav class="navbar  navbar-expand-lg text-dark fixed-top " style="box-shadow: 4px;  background:rgba(0, 0, 0, 0.335); height:4rem ">

        <div class="container">

            <a href="#" class=" navbar-brand fw-bold  text-light">
                <img src="images/logo2.png" class="" style="height: 150px;" alt="">
            </a>

            <!-- Hamburger menu button-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <i class="bi bi-list"></i>
            </button>
            <!-- Hamburger menu ends -->



            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto lead fw-bold  mx-2" style=" gap:0.51rem">

                    <li class="nav-item">
                        <a href="index.php" class=" nav-link text-white ">Home</a>

                    </li>



                    <li class=" nav-item">
                        <a href="programs.php" class="nav-link text-white">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a href="involved.php" class="nav-link text-white ">Get Involved</a>
                    </li>
                    <li class="nav-item">
                        <a href="events.php" class="nav-link text-white">Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="blog.php" class="nav-link text-white ">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a href="blog.php" class=" btn fw-bold btn-md text-white " style="background:var(--colorThree);">Contact Us</a>
                    </li>

                </ul>
            </div>

        </div>

    </nav>
    <!-- Nav section Ends -->


    <!-- Showcase Section -->
    <section class="text-center p-2">

        <style>
            body {
                background: var(--colorFour);
            }


            .carousel-item {
                height: 45rem;
                background-color: #000;
                color: white;
                position: relative;
            }

            .contain {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                margin-bottom: 18rem;

            }

            .overlay-image {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                top: 0;
                background-position: center;
                background-size: cover;

                opacity: 0.5;
            }

            .overlayimage {
                height: 90vh;
                background-position: center;
                background-size: cover;

            }
        </style>
        <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>

            </ol>
            <div class="carousel-inner">
                <!-- 1 -->
                <div class="carousel-item active p-5 " data-interval="300">
                    <div class="overlay-image" style="background-image:url(images/seminar.jpg)">

                    </div>
                    <div class="contain p-5">
                        <h1>The African Lantern Event Catalogue</h1>
                        <a href="#event" class="btn btn-lg btn-warning text-white">Our Events</a>
                    </div>
                </div>
                <!-- 2 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/seminar2.jpg)"></div>
                    <div class="contain p-5">
                        <h1>The African Lantern Event Catalogue</h1>
                        <a href="#event" class="btn btn-lg btn-warning text-white">Our Events</a>
                    </div>
                </div>
                <!-- 3 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/seminar3.jpg)"></div>
                    <div class="contain p-5">
                        <h1>The African Lantern Event Catalogue</h1>
                        <a href="#event" class="btn btn-lg btn-warning text-white">Our Events</a>
                    </div>
                </div>
                <!-- 4 -->

            </div>
        </div>
    </section>

    <!-- Showcase Section -->
    <!--events-->
    <section id="event" class="p-5  text-dark ">
        <hr>
        <div class="row align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);" id="programs">The African Lantern Events Catalogue</h2>

            <button class="btn fw-bold  btn-lg" style="background: var(--colorThree);" data-bs-toggle="modal" data-bs-target="#enroll"><i class="bi bi-chevron-down"></i> View our Events Catalogue</button><!-- Button trigger modal -->
            <!-- Pop up modal -->
            <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-success">No Upcoming Events</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">

                            <div class=" col-md" style="background-color: black; ">
                                <div class="overlayimage" style="background-image:url(images/pexels-vladbagacian-1637870.jpg); opacity:0.5;"></div>
                                <div class="contain text-white p-5">
                                    <h1>No Event Catalogue Yet. Stay Tuned
                                    </h1>
                                    <a href="#" class="btn btn-lg btn-warning">Our Programs</a>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>
        <hr>
    </section>
    <!-- events-->
    <!-- Showcase Section -->

    </main>

    <!-- Footer section -->
    <footer class="p-5 bg-dark text-white  text-left position-relative">
        <section class="container">
            <div class="row">
                <!-- The African Lantern -->
                <div class="col-md ">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-md-start">
                            <div class=" mb-3"> <!-- In bootswtrap it is possible to use the h1 tag as a class -->
                                <h3 class="card-title mb-3" style="color: var(--colorThree);">
                                    The African Lantern
                                </h3>
                                <p class="mt-3">
                                    Plot 453F, Bob Marley Street 2nd Avenue
                                </p>
                                <p class="mt-3">
                                    Cross River, Calabar,
                                    Nigeria
                                </p>
                                <p class="mt-3">

                                    Phone: +234 816 797 5442

                                </p>
                                <p class="mt-3">
                                    Email: theafricanlantern@gmail.com
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Useful Links -->
                <div class="col-md  ">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-md-start">
                            <div class=" mb-3"> <!-- In bootswtrap it is possible to use the h1 tag as a class -->
                                <h3 class="card-title mb-3" style="color: var(--colorThree);">
                                    Useful Links
                                </h3>
                                <div class="row">
                                    <a href="programs.php" class=" text-white nav-link mt-3">
                                        <i class="bi bi-chevron-right"></i> Programs
                                    </a>
                                    <a href="#about" class=" text-white nav-link mt-1">
                                        <i class="bi bi-chevron-right"></i> Impact
                                    </a>
                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-chevron-right"></i> Events
                                    </a>
                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-chevron-right"></i> Blog
                                    </a>
                                </div>

                                <!-- footer social links -->
                                <div style="display: flex; flex-direction:row; justify-content:center;">
                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-facebook"></i>
                                    </a>
                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-instagram"></i>
                                    </a>

                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-linkedin"></i>
                                    </a>
                                </div>
                                <!-- footer social links -->

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Our Programs -->
                <div class="col-md  ">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-md-start">
                            <div class=" mb-3"> <!-- In bootswtrap it is possible to use the h1 tag as a class -->
                                <h3 class="card-title mb-3" style="color: var(--colorThree);">
                                    Our Programs
                                </h3>
                                <div class="row">
                                    <a href="programs.php" class=" text-white nav-link mt-3">
                                        <i class="bi bi-chevron-right"></i> Vocational Training Programs

                                    </a>
                                    <a href="#about" class=" text-white nav-link mt-1">
                                        <i class="bi bi-chevron-right"></i>
                                        Mentorship Scheme

                                    </a>
                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-chevron-right"></i> Mentor Profiles:

                                    </a>
                                    <a href="#" class=" text-white nav-link mt-1">
                                        <i class="bi bi-chevron-right"></i> Career Counseling & Guidance:


                                    </a>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <!-- Join newsletter -->
                <div class="col-md  ">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-start text-sm-start">
                            <div class=" mb-3"> <!-- In bootswtrap it is possible to use the h1 tag as a class -->
                                <h3 class="card-title  mb-3" style="color: var(--colorThree);">
                                    Join our Newsletter
                                </h3>

                                <form method="get" class="form-control ">
                                    <div class="row">
                                        <div class=" col mb-3">
                                            <label for="email" class=" form-control form-label">Email address</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1" name="newsletter_email" placeholder="name@example.com">
                                            <button class="btn  mt-3 btn-sm" style="background: var(--colorThree);" type="submit">Subscribe</button>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>

        <div class="p-3 text-white text-center position-relative">
            <div class="container">


                <p class="lead">© Copyright The African Lantern. All Rights Reserved</p>


                <a href="#" class="position-absolute bottom-0 end-0 p-1 text-success">
                    <i class="bi bi-arrow-up-circle h1"></i>
                </a>

            </div>
        </div>
    </footer>
    <!-- Footer section -->



















    <!-- Bootstrap Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Bootstrap Javascript -->

    <!-- AOS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js">

    </script>

    <script>
        AOS.init();
    </script>
    <!-- AOS -->

    <!-- Jquery Javascript -->
    <script src="javascript/jquery3.7.1.min.js"></script>
    <!-- Jquery Javascript -->
    <!-- Owl Carousel -->
    <script src="javascript/owl.carousel.min.js"></script>
    <!-- Owl Carousel -->

    <!-- Custom Javascript -->
    <script src="javascript/main.js"></script>
    <!-- Custom Javascript -->
</body>

</html>