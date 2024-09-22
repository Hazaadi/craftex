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
                        <a data-bs-target="#event" data-bs-toggle="modal" href="events.php" class="nav-link text-white">Events</a>
                    </li>
                    <li class="nav-item">
                        <a data-bs-target="#blog" data-bs-toggle="modal" href="blog.php" class="nav-link text-white ">Blog</a>
                    </li>

                    <li class="nav-item">
                        <a data-bs-target="#connect" data-bs-toggle="modal" class=" btn fw-bold btn-md text-white " style="background:var(--colorThree);">Contact Us</a>
                    </li>

                </ul>
            </div>

        </div>

    </nav>
    <!-- Nav section Ends -->


    <div class="modal fade " data-aos="fade-down" id="enroll2" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h2 style="color: rgba(8, 47, 76);">Drop a message</h2>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body  text-dark">
                    <div style="display: flex;" class="mt-2">
                        <div class="col  col-lg">
                            <div class="card " style="background-color: rgba(247, 245, 240);">
                                <hr>
                                <div class="card-body text-center">

                                    <p class="fst-italic "><i class="bi bi-geo-alt"></i></p>
                                    <h3 class="card-title mb-3 mt-3 ">Locate Me</h3>
                                    <p class="card-text text-center">
                                        18 Orok Ita Lane, Big Qua Town, Calabar Municipality, Cross River State,Nigeria
                                    </p>
                                    <p class="fst-italic "><i class="bi bi-phone"></i></p>
                                    <h3 class="card-title mb-3 mt-3 ">Call Me</h3>
                                    <p class="card-text text-center">
                                        +234 815 919 6343
                                    </p>

                                    <p><i class="bi bi-envelope"></i></p>
                                    <a href="mailto:nuelbowilliams@gmail.com" style="background-color: rgba(8, 47, 76);" class="btn btn-lg text-white">Email Here</a>

                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-white btn-lg" style="background: rgba(8, 47, 76);" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " data-aos="fade-down" id="blog" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h2 style="color: var(--colorThree)">Blog in development</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-dark">
                    <div class="img-fluid w-100" style="background: url(images/conference.jpg);"></div>
                    <div class="spinner-border text-primary" role="status">
                    </div>
                    <br>
                    <span class="sr-only"> Loading...</span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-white btn-lg" style="background:var(--colorThree)" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " data-aos="fade-down" id="event" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">
                    <h2 style="color: var(--colorThree)">Event catalogue</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-dark">
                    <div class="img-fluid w-100" style="background: url(images/conference.jpg);"></div>
                    <div class="spinner-border text-primary" role="status">
                    </div>
                    <br>
                    <span class="sr-only"> Loading...</span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-white btn-lg" style="background:var(--colorThree)" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " data-aos="fade-down" id="connect" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content ">
                <div class="modal-header ">

                    <h2 style="color: rgba(8, 47, 76);">Drop a message</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body  text-dark">

                    <form method="post" class="p-3" style="background:rgba(247, 245, 240);">

                        <div class="  row form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Full Name</label>
                                <input type="text" class="form-control" name="name" id="inputPassword4" placeholder="Name">
                            </div>
                        </div>
                        <div class=" mt-2 form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                        </div>

                        <div class=" mt-2 form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="question" rows="3"></textarea>
                        </div>
                        <div class=" mt-2 row form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="city" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <input type="text" name="state" class="form-control" name="state" id="inputZip">
                            </div>
                            <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" name="zip" class="form-control" id="inputZip">
                            </div>
                        </div>
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn mt-2 btn-primary">Send</button>
                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn text-white btn-lg" style="background: rgba(8, 47, 76);" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Showcase Section -->
    <section class="p-2 shadow text-center" style="background: var(--colorThree);">

        <style>
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
                <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <!-- 1 -->
                <div class="carousel-item active p-5 " data-interval="300">
                    <div class="overlay-image" style="background-image:url(images/impact0.jpg)">

                    </div>
                    <div class="contain p-5">
                        <h1>Get involved Today!</h1>
                        <a href="#signup" class="btn btn-md  text-white" style="background:var(--colorThree)">Sign Up</a>
                    </div>
                </div>
                <!-- 2 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/involve2.jpg)"></div>
                    <div class="contain p-5">
                        <h1>Get involved Today!</h1>
                        <a href="#signup" class="btn btn-md  text-white" style="background:var(--colorThree)">Sign Up</a>
                    </div>
                </div>
                <!-- 3 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/involve3.jpg)"></div>
                    <div class="contain p-5">
                        <h1>Get involved Today!</h1>
                        <a href="#signup" class="btn btn-md  text-white" style="background:var(--colorThree)">Sign Up</a>
                    </div>
                </div>
                <!-- 4 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/involved4.jpg)"></div>
                    <div class="contain p-5">
                        <h1>Get involved Today!</h1>
                        <a href="#signup" class="btn btn-md  text-white" style="background:var(--colorThree)">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Showcase Section -->

    <!-- Volunteers -->
    <hr>
    <hr>
    <hr>
    <section id="vocation" class=" text-dark " style="background: var(--colorThree); padding:5rem" data-aos="fade-down">
        <div class="row align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);"> Volunteer with The African Lantern</h1>
                <div class="col-md ">
                    <img src="images/volunteer.jpg" alt="" class="img-fluid shadow p-1 rounded w-100" data-aos="fade-right">
                </div>
                <div class="col-md p-2" style="background: var(--textLayer);">
                    <h3 style="color:var(--colorOne);">Volunteer Here</h3>
                    <p class="lead">


                        At The African Lantern, volunteers are the heartbeat of our mission, playing a crucial role in empowering Africa's next generation of leaders, innovators, and entrepreneurs. By volunteering, you become a key part of our efforts to uplift African youth and equip them with the skills, knowledge, and mentorship they need to build successful careers and businesses. Whether you’re passionate about mentoring, vocational training, or supporting our administrative operations, there are numerous ways for you to get involved and make a meaningful difference in the lives of young people across the continent.


                    </p>

                    <a #signup class="btn text-white btn-md" style="background:var(--colorThree);" data-bs-toggle="modal" data-bs-target="#enroll"><i class="bi bi-chevron-right"></i>Volunteer Today!</a><!-- Button trigger modal -->
                    <!-- Pop up modal -->
                    <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="text-success">Volunteer</h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-dark">



                                    <form class="form-group" method="post" style="">
                                        <!-- fiestname -->
                                        <div class="form-group">
                                            <label for="Email1" class=" fw-bold">First Name</label>
                                            <input type="text" class="form-control" name="first_name" aria-describedby="emailHelp" placeholder="First Name" value="<?php
                                                                                                                                                                    if ($form_errors) {
                                                                                                                                                                        echo $first_name;
                                                                                                                                                                    }
                                                                                                                                                                    ?>">

                                        </div>
                                        <!-- middlename -->
                                        <div class=" form-group">
                                            <label for="Password" class=" fw-bold">Middle Name</label>
                                            <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="<?php
                                                                                                                                        if ($form_errors) {
                                                                                                                                            echo $middle_name;
                                                                                                                                        }
                                                                                                                                        ?>">

                                        </div>
                                        <!-- lastname -->
                                        <div class=" form-group">
                                            <label for="Password1" class=" fw-bold">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php
                                                                                                                                    if ($form_errors) {
                                                                                                                                        echo $last_name;
                                                                                                                                    }
                                                                                                                                    ?>">
                                        </div>
                                        <!-- Password -->
                                        <div class=" form-group">
                                            <label for="exampleInputPassword1" class=" fw-bold">Email</label>
                                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php
                                                                                                                                if ($form_errors) {
                                                                                                                                    echo $email;
                                                                                                                                }
                                                                                                                                ?>">

                                        </div>
                                        <!-- Password -->
                                        <div class=" form-group">
                                            <label for="exampleInputPassword1" class=" fw-bold">Password</label>
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" class="fw-bold">Select Role</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="category">
                                                <option>

                                                </option>
                                                <option>Volunteer</option>
                                                <option>Student</option>

                                            </select>
                                        </div>
                                        <div class="row px-2">
                                            <button type="submit" class="btn mt-md-3 btn-sm text-light btn-warning">Submit</button>
                                            <p class="text-dark mt-1">Already a Member? <a class="text-warning" href="#">Login Here</a></p>
                                        </div>
                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </section>
    <!-- volunteers-->
    <hr>
    <hr>
    <hr>
    <!-- Partnerships -->
    <section id="mentorship" class="  text-dark " style="background: var(--colorThree); padding:5rem" data-aos="fade-down">
        <div class="row align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);"> Partner with The African Lantern</h2>
            <div class="col-md mt-3">
                <img src="images/joinus.jpg" alt="" class="img-fluid shadow p-1 rounded w-100 rounded" data-aos="fade-right">
            </div>
            <div class="col-md p-2" style="background:var(--textLayer);">
                <h3 class="" style="color:var(--colorOne)"> Empower Africa's Future Together
                </h3>
                <p class="lead">

                    At The African Lantern, we understand that empowering Africa’s youth is not a mission we can achieve alone. Partnerships are at the core of our strategy to create meaningful and lasting change. By collaborating with corporations, non-profits, government entities, and educational institutions, we can expand our reach, enhance the quality of our programs, and maximize the opportunities available to young Africans.
                    Our partners are key to providing the expertise, resources, and support needed to equip Africa’s future leaders, innovators, and entrepreneurs with the skills and knowledge necessary to succeed in an increasingly competitive global economy.


                </p>
                <button class="btn text-white btn-md" style="background: var(--colorThree);" data-bs-toggle="modal" data-bs-target="#enroll2"><i class="bi bi-chevron-right"></i> Partner with us</button><!-- Button trigger modal -->


                <div class="modal fade" id="enroll2" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background: gainsboro;">
                                <h2 class="text-success">Register here</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">


                                <form class="form-group" method="post" style="">
                                    <!-- fiestname -->
                                    <div class="form-group">
                                        <label for="Email1" class=" fw-bold">First Name</label>
                                        <input type="text" class="form-control" name="first_name" aria-describedby="emailHelp" placeholder="First Name" value="<?php
                                                                                                                                                                if ($form_errors) {
                                                                                                                                                                    echo $first_name;
                                                                                                                                                                }
                                                                                                                                                                ?>">

                                    </div>
                                    <!-- middlename -->
                                    <div class=" form-group">
                                        <label for="Password" class=" fw-bold">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="<?php
                                                                                                                                    if ($form_errors) {
                                                                                                                                        echo $middle_name;
                                                                                                                                    }
                                                                                                                                    ?>">

                                    </div>
                                    <!-- lastname -->
                                    <div class=" form-group">
                                        <label for="Password1" class=" fw-bold">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php
                                                                                                                                if ($form_errors) {
                                                                                                                                    echo $last_name;
                                                                                                                                }
                                                                                                                                ?>">
                                    </div>
                                    <!-- Password -->
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1" class=" fw-bold">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php
                                                                                                                            if ($form_errors) {
                                                                                                                                echo $email;
                                                                                                                            }
                                                                                                                            ?>">

                                    </div>
                                    <!-- Password -->
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1" class=" fw-bold">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="fw-bold">Select Role</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                                            <option>

                                            </option>
                                            <option>Volunteer</option>
                                            <option>Student</option>

                                        </select>
                                    </div>
                                    <div class="row px-2">
                                        <button type="submit" class="btn mt-md-3 btn-sm text-light btn-warning">Submit</button>
                                        <p class="text-dark mt-1">Already a Member? <a class="text-warning" href="#">Login Here</a></p>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr>
    <hr>
    <hr>
    <!-- Partnership -->

    <!-- Donate -->
    <section id="mentorship" class=" text-dark " style="background:var(--colorThree); padding:5rem" data-aos="fade-down">

        <div class="row align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);"> Donate to The African Lantern</h2>
            <div class="col-md mt-3">
                <img src="images/donate.jpg" alt="" class="img-fluid shadow p-1 rounded w-100" data-aos="fade-right">
            </div>
            <div class="col-md p-2" style="background: var(--textLayer);">
                <h2 class="" style="color: var(--colorOne);">
                    Empower Africa’s Next Generation
                </h2>
                <p class="lead">

                    Your donation to The African Lantern goes beyond a financial contribution—it’s an investment in the future of Africa’s youth. Every dollar you contribute directly impacts the lives of young Africans, helping them gain the skills, education, and opportunities they need to build meaningful careers, start businesses, and contribute to their communities. At African Lantern, we are committed to ensuring that your generosity is used effectively to create real, measurable change. By donating, you play a crucial role in helping us deliver vocational training, mentorship, and career development programs that empower young people to rise above challenges and succeed in an ever-evolving job market.

                </p>

                <button class="btn text-white btn-md" style="background: var(--colorThree);" data-bs-toggle="modal" data-bs-target="#enroll3"><i class="bi bi-chevron-right"></i> Donate Here</button><!-- Button trigger modal -->


                <div class="modal fade" id="enroll3" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="text-success">Donate here</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">


                                <form class="form-group" method="post" style="">
                                    <!-- fiestname -->
                                    <div class="form-group">
                                        <label for="Email1" class=" fw-bold">First Name</label>
                                        <input type="text" class="form-control" name="first_name" aria-describedby="emailHelp" placeholder="First Name" value="<?php
                                                                                                                                                                if ($form_errors) {
                                                                                                                                                                    echo $first_name;
                                                                                                                                                                }
                                                                                                                                                                ?>">

                                    </div>
                                    <!-- middlename -->
                                    <div class=" form-group">
                                        <label for="Password" class=" fw-bold">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="<?php
                                                                                                                                    if ($form_errors) {
                                                                                                                                        echo $middle_name;
                                                                                                                                    }
                                                                                                                                    ?>">

                                    </div>
                                    <!-- lastname -->
                                    <div class=" form-group">
                                        <label for="Password1" class=" fw-bold">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php
                                                                                                                                if ($form_errors) {
                                                                                                                                    echo $last_name;
                                                                                                                                }
                                                                                                                                ?>">
                                    </div>
                                    <!-- Password -->
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1" class=" fw-bold">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php
                                                                                                                            if ($form_errors) {
                                                                                                                                echo $email;
                                                                                                                            }
                                                                                                                            ?>">

                                    </div>
                                    <!-- Password -->
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1" class=" fw-bold">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="fw-bold">Select Role</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                                            <option>

                                            </option>
                                            <option>Volunteer</option>
                                            <option>Student</option>

                                        </select>
                                    </div>
                                    <div class="row px-2">
                                        <button type="submit" class="btn mt-md-3 btn-sm text-light btn-warning">Submit</button>
                                        <p class="text-dark mt-1">Already a Member? <a class="text-warning" href="#">Login Here</a></p>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Donate -->
    <hr>
    <hr>
    <hr>
    <!-- Sign Up section -->

    <section id="signup" class="p-4 container shadow  text-dark " data-aos="fade-down">
        <?php if (!empty($form_errors)) : ?>

            <div class="alert alert-info text-danger">
                <?php foreach ($form_errors as $error) :  ?>
                    <div>
                        <?php echo $error; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

            </div>


            <?php if ($success) : ?>

                <div class="alert bg-success text-white">
                    <?php foreach ($success as $success) :  ?>
                        <div>
                            <?php echo $success; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                </div>


                <div>

                    <h2 class="text-center text-white p-1" style="background: var(--colorThree);">Enrollment Form
                    </h2>
                    <div class="p-1 col-md" style="background-color: black;  ">

                        <div class="overlayimage" style="background-image:url(images/pexels-vladbagacian-1637870.jpg); opacity:1;">


                            <div class=" text-white p-2">

                                <form class="form-group" method="post" style="">
                                    <!-- fiestname -->
                                    <div class="form-group">
                                        <label for="Email1" class=" fw-bold">First Name</label>
                                        <input type="text" class="form-control" name="first_name" aria-describedby="emailHelp" placeholder="First Name" value="<?php
                                                                                                                                                                if ($form_errors) {
                                                                                                                                                                    echo $first_name;
                                                                                                                                                                }
                                                                                                                                                                ?>">

                                    </div>
                                    <!-- middlename -->
                                    <div class=" form-group">
                                        <label for="Password" class=" fw-bold">Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" placeholder="Middle Name" value="<?php
                                                                                                                                    if ($form_errors) {
                                                                                                                                        echo $middle_name;
                                                                                                                                    }
                                                                                                                                    ?>">

                                    </div>
                                    <!-- lastname -->
                                    <div class=" form-group">
                                        <label for="Password1" class=" fw-bold">Last Name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="<?php
                                                                                                                                if ($form_errors) {
                                                                                                                                    echo $last_name;
                                                                                                                                }
                                                                                                                                ?>">
                                    </div>
                                    <!-- Password -->
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1" class=" fw-bold">Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php
                                                                                                                            if ($form_errors) {
                                                                                                                                echo $email;
                                                                                                                            }
                                                                                                                            ?>">

                                    </div>
                                    <!-- Password -->
                                    <div class=" form-group">
                                        <label for="exampleInputPassword1" class=" fw-bold">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1" class="fw-bold">Select Role</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                                            <option>

                                            </option>
                                            <option>Volunteer</option>
                                            <option>Student</option>

                                        </select>
                                    </div>
                                    <div class="row px-2">
                                        <button type="submit" class="btn mt-md-3 btn-sm text-light btn-warning">Submit</button>
                                        <p class="text-dark mt-1">Already a Member? <a class="text-warning" href="#">Login Here</a></p>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>




    </section>
    <!-- Sign Up section -->

    <hr>
    <hr>
    <hr>

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

                                <form method="post" class="form-control ">
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