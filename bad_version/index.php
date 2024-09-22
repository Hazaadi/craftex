<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=African_Lantern', 'root', '');

$result = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$form_errors = [];
$newsletter_Email = '';
$newsletter_errors = [];
$success = [];
$success_subscribe = [];
$email = '';
$name = '';
$address = '';
$question = '';
$city = '';
$state = '';
$zip = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    # code...

    $email = $_POST['email'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $question = $_POST['question'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $date = date('Y-m-d H:m:s');

    if (!$email) {
        $form_errors[] = 'Input your email';
    }

    if (!$name) {
        $form_errors[] = 'Input your name';
    }

    if (!$address) {
        $form_errors[] = 'Input your address';
    }

    if (!$question) {
        $form_errors[] = 'Input your question';
    }
    if (!$city || !$state || !$zip) {
        $form_errors[] = 'I need to know your location';
    }


    if (empty($form_errors)) {
        # code...


        $statement = $pdo->prepare("INSERT INTO african_lantern_chat (email, name, address, question, city, state, zip, create_date)
     VALUES(:name, :email, :address, :question, :city, :state, :zip, :date) #Insert into products these values");

        $statement->bindValue(':email', $email);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':address', $address);
        $statement->bindValue(':question', $question);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
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
        $succes_subscribe[] = 'Review Sent';
    }
}


?>



<?php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=African_Lantern', 'root', '');

$result = $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);





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

    <!-- Modals  -->

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

    <!-- Modals  -->




    <!-- Nav section -->
    <nav class="navbar   navbar-expand-lg text-dark fixed-top " style="box-shadow: 4px;  background:rgba(0, 0, 0, 0.335); height:4rem ">

        <div class="container">

            <a href="#" class=" navbar-brand fw-bold  text-light active">
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

    <!-- Showcase Section -->
    <section class="  rounded text-sm-justify">

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
                margin-bottom: 50px;

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
                height: 53vh;
                background-position: center;
                background-size: cover;

            }

            h2 {
                color: var(--colorThree);
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
                    <div class="overlay-image" style="background-image:url(images/black.jpg)">

                    </div>
                    <div class="contain  p-5">
                        <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                        <a href="involved.php" class="btn btn-lg  text-white " style="background: var(--colorThree);">Register</a>
                    </div>
                </div>
                <!-- 2 -->
                <div class=" carousel-item p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/black2.jpg)"></div>
                    <div class="contain p-5">
                        <h1>NextGen Scholars supports high school and college students by providing vocational education, career coaching, and mentorship programs to shape their future.
                        </h1>
                        <a href="involved.php" class="btn btn-lg  text-white" style="background: var(--colorThree);">Register</a>
                    </div>
                </div>
                <!-- 3 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/black3.jpg)"></div>
                    <div class="contain p-5">
                        <h1>Bright Futures is dedicated to guiding students toward success with hands-on training, career advice, and life-changing mentorship opportunities.
                        </h1>
                        <a href="involved.php" class="btn btn-lg  text-white " style="background: var(--colorThree);">Register</a>
                    </div>
                </div>
                <!-- 4 -->
                <div class="carousel-item  p-5" data-interval="200">
                    <div class="overlay-image" style="background-image:url(images/pexels-harrisonhaines-3536487.jpg)"></div>
                    <div class="contain p-5">
                        <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                        <a href="involved.php" class="btn btn-lg text-white" style="background: var(--colorThree);">Register</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Showcase Section -->

    <hr>
    <hr>
    <hr>

    <!-- About us section -->
    <section id="about" class="text-center" data-aos="fade-down" style="background:var(--colorThree);padding:5rem;">

        <h2 class="text-center text-white  p-1" style="background:var(--colorOne);">About Us</h2>
        <div class="row align-items-center gx-5 justify-content-between">

            <div class=" col-md p-3 " style="background:var(--textLayer); box-shadow:5px 4px rgb(70, 188, 210)">
                <h3 class="" style="color: rgb(233, 177, 71);">The African Lantern Mission</h3>
                <p class=" lead">
                    Our mission is to provide African youth, especially those in high school and undergraduate programs, with the tools and guidance to pursue meaningful career paths. Through vocational skills training, personalized mentorship, and comprehensive career counseling, we aim to empower future generations to become self-reliant and fulfilled.
                </p>
                <p class="lead"> We strive to foster a culture of innovation, leadership, and resilience, equipping young people with the confidence and skills to navigate an ever-evolving global workforce.</p>
            </div>


            <div class=" col-md shadow p-1" style="background:black; z-index: -1;  ">
                <img src="images/pexels-vladbagacian-1637870.jpg" class="img-fluid w-100" alt="">
            </div>
        </div>



        </div>

    </section>
    <!-- About us section -->
    <hr>
    <hr>
    <hr>

    <!-- Our vision section -->
    <section id="vision" class="  text-dark text-center" data-aos="fade-down" style="background:var(--colorThree); padding:5rem">

        <div class="row align-items-center justify-content-between" style="">

            <div style="background:var(--textLayer); box-shadow:5px 4px rgb(70, 188, 210);" class=" col-md p-3">
                <h3 class="" style="color: rgb(233, 177, 71);">The African Lantern Vision</h3>
                <p class="lead">

                    Our vision is to create a future where every African youth has access to vocational skills, informed career guidance, and strong mentorship networks, ensuring their transition from education to the workforce is smooth, purposeful, and impactful.t
                </p>
                <p class="lead"> We aspire to cultivate a generation of empowered, innovative leaders who are equipped with the confidence, skills, and opportunities to drive sustainable development, economic growth, and social progress, creating lasting change in their communities and across the African continent</p>



            </div>



            <div class="modal fade" id="enroll2" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-success">Mentorship Scheme</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            <h3> Sector Specific Mentorship </h3>
                            <p class="lead">
                                Our Sector-Specific Mentorship program connects students with experienced professionals in industries like technology, agriculture, engineering, and design. These mentors offer targeted guidance, sharing practical knowledge, career insights, and hands-on experience specific to each student’s field. This tailored approach helps students sharpen their industry-relevant skills, make informed career decisions, and build strong professional networks. Whether navigating technical challenges or exploring entrepreneurial opportunities, students receive the support they need to excel in their chosen careers, ensuring they are well-prepared for real-world success in their specific sectors. </p>

                            <h3>
                                Holistic Career Guidance
                            </h3>
                            <p class="lead">
                                Mentors play a crucial role in shaping the student’s career journey. From helping students navigate challenges to celebrating their achievements, our mentors are there every step of the way. They provide:

                                <span class="text-success"> Career insights:</span> Drawing from their own experiences and industry knowledge, mentors share valuable advice about career options, industry trends, and emerging opportunities within specific sectors.
                                Skills development: Mentors assess each student’s vocational strengths and help them build on these through targeted guidance, ensuring they gain the competencies needed to excel.

                                <span class="text-success">Networking opportunities: </span> Mentors open doors by connecting students with relevant professionals, organizations, and job opportunities. This gives students access to a network that can help them advance in their careers.

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>


            <div class=" col-md shadow p-1" style="background:black; z-index: -1;  ">

                <div class="overlayimage" style="background-image:url(images/mission2.jpg); z-index: -1; opacity:0.5;">

                </div>
            </div>
        </div>

    </section>
    <!-- Our vision section -->
    <hr>
    <hr>
    <hr>
    <!-- Our Story section -->
    <section id="story" class="p-5 text-dark   text-center" data-aos="fade-down" style="background: var(--colorThree);">
        <div class="row align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);">The African Lantern Story</h2>
            <div id=" myCarousel" class=" shadow p-1 carousel slide " data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- 1 -->
                    <div class="carousel-item active p-5 " data-interval="300">
                        <div class="overlay-image" style="background-image:url(images/story5.jpg)">

                        </div>
                        <div class="contain p-5">
                            <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                            <a href="involved.php" class="btn btn-lg" style="background:var(--colorThree);">Register</a>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="carousel-item  p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/story2.jpg)"></div>
                        <div class="contain p-5">
                            <h1>NextGen Scholars supports high school and college students by providing vocational education, career coaching, and mentorship programs to shape their future.
                            </h1>
                            <a href="involved.php" class="btn btn-lg" style="background:var(--colorThree);">Register</a>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class=" carousel-item p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/story3.jpg)"></div>
                        <div class="contain p-5">
                            <h1>Bright Futures is dedicated to guiding students toward success with hands-on training, career advice, and life-changing mentorship opportunities.
                            </h1>
                            <a href="involved.php" class="btn btn-lg" style="background:var(--colorThree);">Register</a>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class=" carousel-item p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/story4.jpg)"></div>
                        <div class="contain p-5">
                            <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                            <a href="involved.php" class="btn btn-lg" style="background:var(--colorThree);">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-md p-5" style="background:var(--textLayer); box-shadow:5px 4px rgb(70, 188, 210)">
                <p class="lead">
                    Founded with a passion for bridging the gap between education and the working world, The African Lantern began its journey by targeting high school students in their final years (SS2 and SS3) and undergraduates across Africa. Our goal is simple: to equip these students with the skills and knowledge they need to thrive in a rapidly changing world, whether through vocational training or college education. We believe that with the right mentorship and resources, every student can find their path to success.

                </p>
                <p class="lead"> We strive to foster a culture of innovation, leadership, and resilience, equipping young people with the confidence and skills to navigate an ever-evolving global workforce.</p>

            </div>
            <div class="modal fade" id="enroll2" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-success">Mentorship Scheme</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            <h3> Sector Specific Mentorship </h3>
                            <p class="lead">
                                Our Sector-Specific Mentorship program connects students with experienced professionals in industries like technology, agriculture, engineering, and design. These mentors offer targeted guidance, sharing practical knowledge, career insights, and hands-on experience specific to each student’s field. This tailored approach helps students sharpen their industry-relevant skills, make informed career decisions, and build strong professional networks. Whether navigating technical challenges or exploring entrepreneurial opportunities, students receive the support they need to excel in their chosen careers, ensuring they are well-prepared for real-world success in their specific sectors. </p>

                            <h3>
                                Holistic Career Guidance
                            </h3>
                            <p class="lead">
                                Mentors play a crucial role in shaping the student’s career journey. From helping students navigate challenges to celebrating their achievements, our mentors are there every step of the way. They provide:

                                <span class="text-success"> Career insights:</span> Drawing from their own experiences and industry knowledge, mentors share valuable advice about career options, industry trends, and emerging opportunities within specific sectors.
                                Skills development: Mentors assess each student’s vocational strengths and help them build on these through targeted guidance, ensuring they gain the competencies needed to excel.

                                <span class="text-success">Networking opportunities: </span> Mentors open doors by connecting students with relevant professionals, organizations, and job opportunities. This gives students access to a network that can help them advance in their careers.

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

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
    <!-- Our Story section -->

    <!--Impact Section -->
    <section id="impact" class="p-5 text-dark  text-center " style="background: var(--colorThree);">

        <div class="row  align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);">The African Lantern Impact to Society</h2>
            <div class=" col-md mt-3">
                <img src="images/impact0.jpg" alt="" class="img-fluid shadow p-1  rounded w-100" data-aos="flip-right">
            </div>
            <div class="col-md p-3" style="background: var(--textLayer); box-shadow:5px 4px rgb(70, 188, 210)" data-aos="fade-right">
                <h3 style="color:var(--colorOne)">Our Impact</h3>
                <p class="lead">

                    At The African Lantern, we believe in measuring our impact through data-driven insights that highlight the tangible outcomes of our work. Below is a summary of key statistics and metrics that showcase our success in mentoring, vocational training, and overall student outcomes. These numbers reflect our commitment to empowering young Africans and equipping them with the skills, mentorship, and guidance needed to thrive in today’s competitive job market.
                    At The African Lantern, we strive to foster a culture of innovation, leadership, and resilience, empowering young people to thrive in an ever-evolving global workforce.</p>

            </div>
            <div class="modal fade" id="enroll2" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-success">Mentorship Scheme</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-dark">
                            <h3> Sector Specific Mentorship </h3>
                            <p class="lead">
                                Our Sector-Specific Mentorship program connects students with experienced professionals in industries like technology, agriculture, engineering, and design. These mentors offer targeted guidance, sharing practical knowledge, career insights, and hands-on experience specific to each student’s field. This tailored approach helps students sharpen their industry-relevant skills, make informed career decisions, and build strong professional networks. Whether navigating technical challenges or exploring entrepreneurial opportunities, students receive the support they need to excel in their chosen careers, ensuring they are well-prepared for real-world success in their specific sectors. </p>

                            <h3>
                                Holistic Career Guidance
                            </h3>
                            <p class="lead">
                                Mentors play a crucial role in shaping the student’s career journey. From helping students navigate challenges to celebrating their achievements, our mentors are there every step of the way. They provide:

                                <span class="text-success"> Career insights:</span> Drawing from their own experiences and industry knowledge, mentors share valuable advice about career options, industry trends, and emerging opportunities within specific sectors.
                                Skills development: Mentors assess each student’s vocational strengths and help them build on these through targeted guidance, ensuring they gain the competencies needed to excel.

                                <span class="text-success">Networking opportunities: </span> Mentors open doors by connecting students with relevant professionals, organizations, and job opportunities. This gives students access to a network that can help them advance in their careers.

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </section>
    <!-- Impact Section -->
    <hr>
    <hr>
    <hr>

    <!-- Values section -->
    <section class="p-5 mt-5" id="questions" data-aos="fade-down">
        <div class="container">

            <h2 class="text-center text-white p-1" style="background: var(--colorThree);">The African Lantern Values</h2>
            <div class="accordion accordion-flush py-4" id="questions">
                <!-- First item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-one">
                            Empowerment
                        </button>
                    </h2>
                    <div id="question-one" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            We believe in the power of individuals to shape their own futures. By providing youth with the right tools, resources, and opportunities, we empower them to take charge of their lives and career paths. Our approach fosters self-confidence, resilience, and leadership, enabling young people to become agents of positive change within their communities.

                        </div>
                    </div>
                </div>
                <!-- First item -->

                <!-- Second Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-two">
                            Education

                        </button>
                    </h2>
                    <div id="question-two" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Education is the cornerstone of progress, and we are committed to making quality learning accessible to all. Through vocational training, career counseling, and mentorship, we provide students with practical skills and knowledge. We believe that education should not only inform but inspire, equipping youth to pursue fulfilling careers and contribute meaningfully to society.


                        </div>
                    </div>
                </div>
                <!-- Second Item -->

                <!-- Third Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-three">
                            Innovation
                        </button>
                    </h2>
                    <div id="question-three" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Innovation drives growth, and we encourage creativity and forward-thinking in everything we do. By fostering a culture of innovation, we help young people develop new ideas and solutions that address challenges in their communities. Our programs emphasize adaptability, critical thinking, and entrepreneurship, preparing youth to thrive in an ever-evolving global environment.
                        </div>
                    </div>
                </div>
                <!-- Third Item -->

                <!-- Fourth Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-four">
                            Community
                        </button>
                    </h2>
                    <div id="question-four" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            We recognize the strength of collective action and prioritize building strong, supportive communities. Our initiatives aim to create networks of peers, mentors, and leaders that foster collaboration and mutual growth. By working together, we can create an environment where everyone’s potential is realized, and collective success benefits the entire community.
                        </div>
                    </div>
                </div>
                <!-- Fourth Item -->
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#question-five">
                            Sustainability.
                        </button>
                    </h2>
                    <div id="question-five" class="accordion-collapse collapse" data-bs-parent="#questions">
                        <div class="accordion-body">
                            Sustainability is central to our mission, not only in terms of environmental responsibility but also in creating lasting impact. We focus on long-term solutions that empower youth to be self-reliant and resilient. By promoting sustainable practices in education, innovation, and community development, we aim to ensure a prosperous and balanced future for generations to come.
                        </div>
                    </div>

                </div>
            </div>




        </div>
        </div>

    </section>
    <!-- Values section -->
    <hr>
    <hr>
    <hr>


    <!-- Contact us -->
    <section id="contact" class="p-5 " data-aos="fade-down">
        <div class="container">
            <h2 class="text-center text-white p-1" style="background: var(--colorThree);">Reach Out to Us Today!</h2>
            <p class="lead text-center text-success mb-3  ">
                Your feedback, inquiries, and collaboration ideas are invaluable to us. Here's how you can connect with our team


            </p>
            <div class="row g-4">
                <!-- col-md-6 col-lg-3 this basically means that on medium screens the col should take off half of the grid system -->
                <!-- I basically means making the div ratio its self to be able to equaly accept 6 columns. Means on medium screens ratio your size to occupy 6 columns. While on large scrrens, expand yourself to occupy 3 columns per row of the div  -->

                <!-- Instructor 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-light">
                        <hr>
                        <div class="card-body text-center">

                            <p class="fst-italic "><i class="bi bi-geo-alt"></i></p>
                            <h3 class="card-title mb-3 mt-3 ">Locate Us</h3>
                            <p class="card-text text-center">
                                18 Orok Ita Lane, Big Qua Town, Calabar Municipality, Cross River State
                            </p>

                        </div>
                        <hr>
                    </div>
                </div>




                <!-- Instructor 2 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-light">
                        <hr>
                        <div class="card-body text-center">

                            <p class="fst-italic "><i class="bi bi-telephone"></i></p>
                            <h3 class="card-title mb-3 mt-3 ">Contact Us</h3>
                            <p class="card-text text-center">
                                +234 815 919 6343
                            </p>
                            <br>

                        </div>
                        <hr>
                    </div>
                </div>

                <!-- Instructor 3 -->
                <div class="col-md-6 col-lg-4">
                    <div class="card bg-light">
                        <hr>
                        <div class="card-body text-center">

                            <p class="fst-italic "><i class="bi bi-envelope"></i></p>
                            <h3 class="card-title mb-3 mt-3 ">Email Us</h3>
                            <p class="card-text text-center">
                                <a class="btn btn-md" style="background: var(--colorThree);" href="mailto:theafricanlantern@gmail.com">Send Email</a>

                            </p>

                        </div>
                        <hr>

                    </div>
                </div>


            </div>
        </div>

    </section>

    <!-- Contact us -->
    <hr>
    <hr>
    <hr>
    <!-- Footer -->
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
    <!-- Footer -->





















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