<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Alb Esthetics</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/adm.css" rel="stylesheet">


</head>

<body>
<?php

//learn from w3schools.com

session_start();
require_once __DIR__ . '/../../services/userService.php';
$userService = new UserService();
require_once __DIR__ . '/../../services/appointmentService.php';
$appointmentService = new AppointmentService();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
        header("location: ../pages/login.php");
    }

} else {
    header("location: ../pages/login.php");
}
//import database
$email = $_SESSION["user"];


?>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            &nbsp &nbsp
            <i class="bi bi-person-circle"></i> Hello:<?php
            $patient = $userService->getPatientByEmail($email)->fetch_assoc();

            echo $patient['name']; ?> &nbsp &nbsp
            <i class="bi bi-envelope-at"></i> <?php echo $_SESSION['user'];
            ?> <i class="bi bi-phone"></i> <?php
            $patient = $userService->getPatientByEmail($email)->fetch_assoc();

            echo $patient['ptel']; ?>
        </div>
        <div class="d-none d-lg-flex social-links align-items-center">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <img src="../../assets/img/logo.png" width="60px" height="60px">
        <h1 class="logo me-auto"><a href="../../index.php">

                Alb Esthetics</a></h1>


        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#">Home</a></li>
                <li><a class="nav-link scrollto" href="doctors.php">Doctors</a></li>
                <li><a class="nav-link scrollto" href="booking.php">Appointment</a></li>
                <li><a class="nav-link scrollto" href="settings.php">Settings </a></li>
                <li><a href="../../services/logoutService.php"><input type="button" value="Log out"
                                                                      class="logout-btn btn-primary-soft btn"></a>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->

<section id="hero" class="d-flex align-items-center ">
    <div class="container">
        <h1>Dashboard</h1>

        <?php
        date_default_timezone_set('Europe/Amsterdam');

        $today = date('Y-m-d');
        // echo $today;
        $id = $patient["id"];

        $patientrow = $userService->getPatients();
        $doctorrow = $userService->getDoctors();
        $specialities = $userService->getSpecialities();
        $myAppointments = $appointmentService->listAppointmentsByPid($patient['id']);


        ?>

        <!-- ======= Counts Section ======= -->

        <div class="container h-auto bg-white opacity-50 mt-5 my-5 border-radius">
            <p style="font-size: 20px; font-weight: 600; padding-left: 12px;">Status</p>

            <div class="row mt-5">
                <div class="col-lg-4 col-md-6">
                    <div class="count-box border-2 border-dark">
                        <i class="fas fa-user-md"></i>
                        <span data-purecounter-start="0" data-purecounter-end="<?php echo $doctorrow->num_rows ?>"
                              data-purecounter-duration="1" class="purecounter text-center"></span>
                        <h4><?php echo $doctorrow->num_rows ?></h4>
                        <p>Doctors</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="far fa-hospital"></i>
                        <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1"
                              class="purecounter text-center"></span>
                        <h4><?php
                            if ($myAppointments) {
                                echo count($myAppointments);

                            } else {

                                echo 0;
                            }
                            ?></h4>
                        <p>My Appointments</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
                    <div class="count-box">
                        <i class="fas fa-flask"></i>
                        <span data-purecounter-start="0" data-purecounter-end="<?php echo $specialities->num_rows ?>"
                              data-purecounter-duration="1" class="purecounter text-center"></span>
                        <h4><?php echo $specialities->num_rows ?></h4>
                        <p>Specialities</p>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section><!-- End Hero -->


<?php
include("../pages/footer.php");
?>
</body>
</html>