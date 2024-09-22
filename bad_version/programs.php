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
    <!-- Modal section -->

    <div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="text-success">Vocational Training</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-dark">
                    <h3> Technology Training Programs </h3>
                    <p class="lead">In an increasingly digital world, our Technology Training Programs aim to provide learners with cutting-edge skills that meet the demands of the fast-growing tech industry. From basic computer literacy to advanced software development, data analysis, and cybersecurity, these programs offer a comprehensive approach to mastering technology. Participants are exposed to real-world applications, such as coding, networking, and digital marketing, ensuring they are equipped to take on jobs in IT, digital services, or even launch their own tech-based startups. </p>
                    <h3> Arts & Crafts Training Programs </h3>
                    <p class="lead">
                        Our Arts & Crafts Training Programs nurture creativity and craftsmanship, offering participants the opportunity to explore traditional and contemporary art forms while learning how to turn their passion into a sustainable livelihood. Whether in fashion design, pottery, jewelry-making, or fine arts, participants are trained in the techniques needed to produce high-quality, marketable products. They also gain insights into branding, customer relations, and e-commerce, allowing them to turn their creative skills into profitable ventures.

                </div>
                <div class="modal-body text-dark">
                    <h3> Agriculture Training Programs</h3>
                    <p class="lead">Agriculture remains a cornerstone of Africa’s economy, and our Agriculture Training Programs are designed to empower young people to innovate within this essential sector. Participants learn modern farming techniques, sustainable agriculture practices, and agribusiness management. The training spans areas like crop production, livestock management, irrigation, and organic farming. With a focus on sustainability and market access, our programs help young agripreneurs optimize production, reduce environmental impact, and capitalize on growing demand for locally produced food and goods. </p>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>


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
    <section class="p-2 shadow" style="background: var(--colorThree);">
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
    </section>
    <!-- Showcase Section -->


    <hr>
    <hr>
    <hr>

    <!-- Vcational Training -->
    <section id="programs" class="  text-dark " data-aos="fade-down" style="background: var(--colorThree); padding:5rem">
        <div class="row align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorOne);">Our Programs</h2>
            <div class="col-md mt-3" data-aos="flip-right">
                <img src="images/vocational.jpg" alt="" class="img-fluid shadow p-1 rounded w-100">
            </div>
            <div class="col-md p-3" style="background:var(--textLayer);">
                <h2 style="color:var(--colorOne)">Vocational Training Programs
                </h2>
                <p class="lead">
                    We offer a range of vocational training programs, designed to teach practical skills in areas like Technology, Arts & Crafts, Agriculture, and Entrepreneurship. These programs are tailored to meet the needs of young Africans who wish to develop hands-on skills that can directly translate into job opportunities or entrepreneurship.
                    In an increasingly digital world, our Technology Training Programs aim to provide learners with cutting-edge skills that meet the demands of the fast-growing tech industry. From basic computer literacy to advanced software development, data analysis, and cybersecurity, these programs offer a comprehensive approach to mastering technology

                </p>


                <button class="btn btn-md" data-bs-toggle="modal" style="background:var(--colorThree)" data-bs-target="#enroll"><i class="bi bi-chevron-right"></i> Read More</button><!-- Button trigger modal -->



            </div>
        </div>

    </section>
    <!-- Vcational Training -->
    <hr>
    <hr>
    <hr>
    <!-- Mentorship scheme -->
    <section id="mentorship" class="p-5  text-dark " data-aos="fade-down" style="background: var(--colorThree);">

        <div class="row align-items-center mt-3 justify-content-between">
            <h2 class="text-center text-white " style="background: var(--colorOne);">Mentorship Scheme
            </h2>

            <div id="myCarousel" class="carousel slide shadow p-3" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="3"></li>
                </ol>
                <div class="carousel-inner">
                    <!-- 1 -->
                    <div class="carousel-item active p-5 " data-interval="300">
                        <div class="overlay-image" style="background-image:url(images/mentorship_scheme.jpg)">

                        </div>
                        <div class="contain p-5">
                            <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                            <a href="involved.php" class="btn btn-lg " style="background:var(--colorThree)">Register</a>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="carousel-item  p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/mentorship_scheme2.jpg)"></div>
                        <div class="contain p-5">
                            <h1>NextGen Scholars supports high school and college students by providing vocational education, career coaching, and mentorship programs to shape their future.
                            </h1>
                            <a href="involved.php" class="btn btn-lg " style="background:var(--colorThree)">Register</a>
                        </div>
                    </div>
                    <!-- 3 -->
                    <div class="carousel-item  p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/mentorship_scheme3.jpg)"></div>
                        <div class="contain p-5">
                            <h1>Bright Futures is dedicated to guiding students toward success with hands-on training, career advice, and life-changing mentorship opportunities.
                            </h1>
                            <a href="involved.php" class="btn btn-lg " style="background:var(--colorThree)">Register</a>
                        </div>
                    </div>
                    <!-- 4 -->
                    <div class="carousel-item  p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/mentorship_scheme4.jpg)"></div>
                        <div class="contain p-5">
                            <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                            <a href="involved.php" class="btn btn-lg " style="background:var(--colorThree)">Register</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="col-md shadow p-5" style="background:var(--textLayer);">

        <p class="lead">
            Our mentorship program is at the core of The African Lantern’s mission. Each student is paired with a mentor based on their career interests, academic strengths, and vocational skills. Mentors guide students through their career journey, providing valuable insights, support, and networking opportunities. Whether a student is exploring a career in engineering, design, or agriculture, they have a mentor to guide them.


        </p>
        <p class="lead">
            At The African Lantern, our Mentorship Program is a cornerstone of our mission to empower young Africans to succeed in their career paths and entrepreneurial journeys. We understand that learning doesn’t happen in isolation, which is why we pair each of our students with a dedicated mentor who offers personalized guidance, support, and encouragement.</p>

        <button class="btn  btn-md text-white" style="background: var(--colorThree);" data-bs-toggle="modal" data-bs-target="#enroll2"><i class="bi bi-chevron-right"></i> Read More</button><!-- Button trigger modal -->


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
    <!-- Mentorship scheme -->

    <!--Mentors Section -->
    <section id="mentors" class="p-5  text-dark " data-aos="fade-down">


        <h2 class="text-center text-white p-1" style="background: var(--colorThree);">Our Mentors
        </h2>
        <div class=" col-md shadow p-3 mt-5" style="background:black;  ">
            <div class="  overlayimage" style="background-image:url(images/black4.jpg); opacity:0.7;"></div>
        </div>
        <div class="col-md shadow  p-3"
            style="background:var(--textLayer);">
            <p class="lead text-center">

                At The African Lantern, we believe upskilling and training Africa's youth for the future is pivotal to driving the continent's growth and innovation. Our programs are designed to equip young Africans with the skills, knowledge, and confidence they need to succeed in emerging industries and create sustainable opportunities. By empowering them with future-focused training, we are shaping a new generation of leaders and entrepreneurs who will lead Africa’s transformation and build a brighter future for all.


            </p>


            <button class="btn text-white btn-md" data-bs-toggle="collapse"
                style="background:var(--colorThree);" data-bs-target="#enroll3"><i class="bi bi-chevron-down"></i> View Our Mentors</button><!-- Button trigger modal -->

            <!-- Mentor Section -->
            <section class="collapse mt-5" id="enroll3" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                <section id="instructors">
                    <div>
                        <h2 class="text-center text-white p-1" style="background: var(--colorOne);">Our Deligent Mentors</h2>
                        <p class="lead text-center text-success mb-5">
                            Our Instructors all have 10+ years in the Their Profession

                        </p>
                        <div class="row text-success g-4">
                            <!-- col-md-6 col-lg-3 this basically means that on medium screens the col should take off half of the grid system -->
                            <!-- I basically means making the div ratio its self to be able to equaly accept 6 columns. Means on medium screens ratio your size to occupy 6 columns. While on large scrrens, expand yourself to occupy 3 columns per row of the div  -->
                            <!-- Instructor 1 -->
                            <div class="col-md-6 col-lg-3 ">
                                <div class="card bg-light shadow p-3 mb-5 bg-body">
                                    <hr>
                                    <div class="card-body text-center">
                                        <img src="images/blackmann_mentor2.jpg" class="img-fluid w-100 rounded " alt="">
                                        <h3 class="card-title mb-3 mt-3 "> Technology Expert
                                        </h3>
                                        <p class="fst-italic ">Jon Doe</p>
                                        <p class="card-text text-center">
                                            15+ years in software development, passionate about helping youth embrace digital skills.
                                        </p>
                                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <!-- Instructor 2 -->
                            <div class="col-md-6 col-lg-3 ">
                                <div class="card bg-light shadow p-3 mb-5 bg-body">
                                    <hr>
                                    <div class="card-body text-center">
                                        <img src="images/mentor2.jpg" class="img-fluid w-100 rounded" alt="">
                                        <h3 class="card-title mb-3 mt-3 "> Business Strategist</h3>
                                        <p class="fst-italic ">Jane Smith</p>
                                        <p class="card-text text-center">
                                            Specializing in entrepreneurship, helping students turn ideas into thriving businesses.

                                        </p>
                                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <!-- Instructor 3  -->
                            <div class="col-md-6 col-lg-3 ">
                                <div class="card bg-light shadow p-3 mb-5 bg-body">
                                    <hr>
                                    <div class="card-body text-center">
                                        <img src="images/female_mentor2.jpg" class="img-fluid w-100 rounded" alt="">
                                        <h3 class="card-title mb-3 mt-3 ">Agricultural Sci</h3>
                                        <p class="fst-italic ">
                                            Amina Olu</p>
                                        <p class="card-text text-center">
                                            Guiding students interested in sustainable farming and agricultural business and designs.

                                        </p>
                                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                    </div>
                                    <hr>
                                </div>
                            </div>

                            <!-- Instructor 4 -->
                            <div class="col-md-6 col-lg-3">
                                <div class="card bg-light shadow p-3 mb-5 bg-body">
                                    <hr>
                                    <div class="card-body text-center">

                                        <img src="images/black_mentor.jpg" class="img-fluid w-100 rounded" alt="">
                                        <h3 class="card-title mb-3 mt-3 ">Software Engineer</h3>
                                        <p class="fst-italic ">San Dave</p>
                                        <p class="card-text text-center">
                                            Skilled in creating dynamic, server-side web applications with a focus on backend functionality.
                                        </p>
                                        <a href="#"><i class="bi bi-twitter text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-facebook text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-instagram text-dark mx-1"></i></a>
                                        <a href="#"><i class="bi bi-linkedin text-dark mx-1"></i></a>
                                    </div>
                                    <hr>
                                </div>
                            </div>


                        </div>
                    </div>

                </section>
            </section>
    </section>
    <!-- Mentor Section -->
    <hr>
    <hr>
    <hr>

    <!-- Career Counseling -->
    <section id="mentorship" class="p-5  text-dark ">

        <div class="row align-items-center justify-content-between">

            <div class="col-md mt-3">
                <img src="images/careerUguidance.jpg" alt="" class="img-fluid shadow p-3 rounded w-100" data-aos="flip-right">
            </div>
            <div class="col-md  p-3" style="background:var(--textLayer);">
                <h2 class="" style="color: var(--colorOne);">Career Counseling & Guidance
                </h2>
                <p class="lead">
                    In addition to our comprehensive vocational training programs, The African Lantern offers a range of career counseling services aimed at helping students navigate their professional journey with confidence and clarity. We recognize that choosing the right career path can be challenging, especially for young Africans facing a rapidly changing job market and evolving economic opportunities. Our goal is to empower students to make informed decisions that align with their passions, skills, and future aspirations. Our career counseling services are highly personalized, ensuring that each student receives guidance tailored to their unique interests, strengths, and goals.


                </p>


                <button class="btn text-white btn-md" style="background: var(--colorThree);" data-bs-toggle="modal" data-bs-target="#career"><i class="bi bi-chevron-right"></i> Read More</button><!-- Button trigger modal -->


                <div class="modal fade" id="career" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="text-success">Career Counseling & Guidance </h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-dark">
                                <h3> Aligning Passions with Career Paths </h3>
                                <p class="lead">
                                    One of the core objectives of our career counseling services is to help students align their passions with suitable career paths. We believe that true success comes when individuals pursue careers that inspire and motivate them. Whether a student has a passion for creative arts, technology, agriculture, or social change, our counselors work closely with them to identify career options that match their interests and strengths. This not only boosts motivation but also increases the likelihood of long-term success and fulfillment in their chosen field.
                                </p>

                                <h3>
                                    College and Degree Program Advising
                                </h3>
                                <p class="lead">
                                    For students considering further education, our counseling services also provide valuable guidance on college and degree programs that align with their skills and career goals. We advise students on how to choose the right academic pathway by identifying programs that offer the best opportunities for growth, specialization, and future employability. This includes understanding the demand in specific industries, reviewing curriculum options, and exploring scholarship opportunities or financial aid to make higher education more accessible.

                                    We help students understand the academic requirements of various fields, the qualifications needed for specific careers, and how different degree programs can open doors to future opportunities. Whether it’s a technical degree in engineering or a business management course, our counselors offer insights into the programs that will best support the student’s career journey.
                                <h3>
                                    Navigating Career and Educational Opportunities
                                </h3>
                                <p class="lead">
                                    Our career counseling sessions are designed to give students a clear understanding of the educational and career options available to them. By discussing different pathways—such as vocational training, apprenticeships, higher education, or entrepreneurship—students gain a better sense of what steps to take after completing their training at The African Lantern. We equip them with the tools they need to make well-informed decisions about their future, whether that involves entering the workforce directly, continuing their education, or launching their own business.

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
    <!-- Career Counseling -->
    <hr>
    <hr>
    <hr>

    <!-- Workshops -->
    <section id="mentorship" class="p-5 text-dark " data-aos="fade-down" style="">

        <div class="row shadow p-3  align-items-center justify-content-between">
            <h2 class="text-center text-white p-1" style="background: var(--colorThree);">
                Workshops & Seminars
            </h2>

            <div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#myCarousel" data-bs-slide-to="1" class="active"></li>
                    <li data-bs-target="#myCarousel" data-bs-slide-to="2" class="active"></li>

                </ol>
                <div class="carousel-inner">
                    <!-- 1 -->
                    <div class="carousel-item active p-5 " data-interval="300">
                        <div class="overlay-image" style="background-image:url(images/workshop2.jpg)">

                        </div>
                        <div class="contain p-5">
                            <h1>The Lantern Organization focuses on helping young learners realize their potential through practical training, career counseling, and tailored mentorship initiatives.</h1>
                            <a href="involved.php" class="btn btn-lg btn-warning">Register</a>
                        </div>
                    </div>
                    <!-- 2 -->
                    <div class="carousel-item  p-5" data-interval="200">
                        <div class="overlay-image" style="background-image:url(images/workshop1.jpg)"></div>
                        <div class="contain p-5">
                            <h1>NextGen Scholars supports high school and college students by providing vocational education, career coaching, and mentorship programs to shape their future.
                            </h1>
                            <a href="involved.php" class="btn btn-lg btn-warning">Register</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md ">
                <p class="lead text-center  p-3" style="background:var(--textLayer)">

                    At The African Lantern, we regularly host Workshops and Seminars designed to provide students with valuable insights from industry professionals and mentors. These events are an essential part of our mission to enhance students' learning experience beyond the classroom, offering real-world perspectives on career development and skills acquisition.


                    Our workshops and seminars bring together seasoned professionals, industry leaders, and successful entrepreneurs from various sectors. These experts share their experiences, insights, and knowledge, providing students with a deeper
                </p>


            </div>
            <a href="events.php" class="btn text-dark  btn-md" style="background:var(--colorThree);"> Explore Events Catalogue</a>
        </div>
    </section>
    <hr>
    <hr>
    <hr>
    <!-- Workshops -->

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