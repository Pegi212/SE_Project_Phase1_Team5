<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Alb Esthetics</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../../assets/img/logo.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

session_start();

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
        header("location: ../pages/login.php");
    }

} else {
    header("location: ../pages/login.php");
}

require_once __DIR__ . '/../../services/userService.php';
$userService = new UserService();
require_once __DIR__ . '/../../services/appointmentService.php';
$appointmentService = new AppointmentService();


$email = $_SESSION["user"];
$patient = $userService->getPatientByEmail($email)->fetch_assoc();

?>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            &nbsp &nbsp
            <i class="bi bi-person-circle"></i> Hello :<?php echo $patient["name"]; ?> &nbsp &nbsp
            <i class="bi bi-envelope-at"></i> <?php echo $_SESSION['user'];
            ?> <i class="bi bi-phone"></i> <?php echo $patient["ptel"]; ?>
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
        <h1 class="logo me-auto"><a href="index.php">

                Alb Esthetics</a></h1>


        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="index.php">Home</a></li>
                <li><a class="nav-link scrollto " href="doctors.php">Doctors</a></li>
                <li><a class="nav-link scrollto active " href="appointments.php">Appointments</a></li>
                <li><a class="nav-link scrollto " href="settings.php">Settings </a></li>

                <li><a href="../../services/logoutService.php"><input type="button" value="Log out"
                                                                      class="logout-btn btn-primary-soft btn"></a>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->


<center>
    <section>
        <div class="container w-100 h-auto  m-5 d-grid">


            <div class="row ">
                <div class="col-12">

                    <p class="heading-main12"
                       style=" margin-top:70px;margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)"> My Appointments
                        (<?php
                        $myAppointments = $userService->getMyAppointmets($patient["id"], "p");

                        echo $myAppointments->num_rows; ?>)</p>

                </div>
            </div>


            <div class="row search-div">
                <div class="col text-center">


                    <div class="row ">

                        <div class="col ">


                            <div class="abc scroll">
                                <table width="93%" class="sub-table " border="0">
                                    <thead>

                                    <tr>
                                        <th class="table-headin">
                                            ID

                                        </th>
                                        <th class="table-headin">
                                            Doctor Full Name

                                        </th>
                                        <th class="table-headin">
                                            Patient Name
                                        </th>
                                        <th class="table-headin">

                                            Specialties

                                        </th>
                                        <th class="table-headin">

                                            Date
                                        </th>
                                        <th class="table-headin">

                                            Time
                                        </th>
                                        <th class="table-headin">

                                            Event
                                        </th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php


                                    if ($myAppointments->num_rows == 0) {
                                        echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../../assets/img/notfound.png" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="doctors.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Doctors &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';

                                    } else {
                                        for ($x = 0; $x < $myAppointments->num_rows; $x++) {
                                            $row = $myAppointments->fetch_assoc();
                                            $appID = $row["app_id"];
                                            $doc_id = $row["doc_id"];
                                            $doctor = $userService->getDoctorByEmail($userService->getUser($doc_id)->fetch_assoc()["email"])->fetch_assoc();
                                            $patient_name = $patient["name"];
                                            $speId = $doctor["specialties"];
                                            $spcil_res = $userService->getSpecialitieById($speId);
                                            $spcil_array = $spcil_res->fetch_assoc();
                                            $spcil_name = $spcil_array["sname"];
                                            $date = $row["date"];
                                            $time = $row["s_time"];


//                                    $spcil_res = $database->query("select sname from specialties where name='$spe'");
//                                    $spcil_array = $spcil_res->fetch_assoc();
//                                    $spcil_name = $spcil_array["sname"];
                                            echo '<tr>
                                        <td> &nbsp;' .
                                                $appID
                                                . '</td>
                                        <td>
                                        ' . $doctor["name"] . '  ' . $doctor["surname"] . ' 
                                        </td>
                                        <td>
                                            ' . $patient_name . '
                                        </td>  
                                        <td>
                                            ' . $spcil_name . '
                                        </td>    
                                         <td>
                                            ' . $date . '
                                        </td>    
                                         <td>
                                            ' . $time . '
                                        </td>

                                        <td>
                                        <div style="display:flex;justify-content: center;">
                                        &nbsp;&nbsp;&nbsp;
                                        <a href=" ../../services/delete-appointment.php?action=drop&id=' . $appID . '" class="non-style-link"><button  class="btn-danger btn button-icon btn-view"  style="padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;"><font class="tn-in-text">Cancel</font></button></a>
                                       &nbsp;&nbsp;&nbsp;
                                        </div>
                                        </td>
                                    </tr>';

                                        }
                                    }

                                    ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>


                    </div>
                </div>



    </section>

</center>


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


<!-- Vendor JS Files -->
<script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Template Main JS File -->
<script src="../../assets/js/main.js"></script>


<?php
include("../pages/footer.php");
?>

</body>
</html>