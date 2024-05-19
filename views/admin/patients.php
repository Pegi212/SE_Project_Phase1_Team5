<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Estheticians Application</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="../../assets/img/logo.png" rel="icon">


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

if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
        header("location: ../pages/login.php");
    }

} else {
    header("location: ../pages/login.php");
}
require_once __DIR__ . '/../../services/userService.php';
$userService = new UserService();
require_once __DIR__ . '/../../services/appointmentService.php';
$appointmentService = new AppointmentService();

?>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
        <div class="contact-info d-flex align-items-center">
            &nbsp &nbsp
            <i class="bi bi-person-circle"></i> Administrator &nbsp &nbsp
            <i class="bi bi-envelope-at"></i> admin@edoc.com
            <i class="bi bi-phone"></i> +355 224 554 55
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
                <li><a class="nav-link scrollto" href="appointments.php">Appointments</a></li>
                <li><a class="nav-link scrollto active" href="patients.php">Patients </a></li>

                <li><a href="../../services/logoutService.php"><input type="button" value="Log out"
                                                                    class="logout-btn btn-primary-soft btn"></a>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->


<section>
    <div class="container w-100 h-auto d-grid">

        <div class="row search-div">
            <div class="col-8 text-center">
                <div class="search">

                    <form action="" method="post" class="header-search">

                        <input type="search" name="search" class="input-text header-searchbar"
                               placeholder="Search Patient name or Email" list="patient">&nbsp;&nbsp;

                        <?php
                        echo '<datalist id="patient">';
                        $patients = $userService->getPatients();

                        for ($y = 0; $y < $patients->num_rows; $y++) {
                            $row00 = $patients->fetch_assoc();
                            $d = $row00["name"];
                            $c = $row00["email"];
                            echo "<option value='$d'><br/>";
                            echo "<option value='$c'><br/>";
                        };

                        echo ' </datalist>';
                        ?>


                        <input type="Submit" value="Search" class="login-btn btn-primary btn"
                               style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">

                    </form>

                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col">

                <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">Patients
                    (<?php echo $patients->num_rows; ?>)</p>


            </div>
        </div>
        <?php
        if ($_POST) {
            $keyword = $_POST["search"];
            $patients = $userService->searchPatients($keyword);

        } else {
            $patients = $userService->getPatients();

        } ?>

        <div class="row search-div">

            <div class="col">
                <table width="93%" class="sub-table border scrolldown" style="border-spacing:2px;">
                    <thead>
                    <tr>
                        <th class="table-headin">


                            Name

                        </th>
                        <th class="table-headin">


                            Surname

                        </th>

                        <th class="table-headin">
                            Email
                        </th>
                        <th class="table-headin">


                            Telephone

                        </th>
                        <th class="table-headin">


                            Address

                        </th>
                        <th class="table-headin">


                            Registration Date

                        </th>

                        <th class="table-headin">

                            Events

                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    if ($patients->num_rows == 0) {
                        echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../../assets/img/notfound.png" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="patients.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Patients &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';

                    } else {
                        for ($x = 0; $x < $patients->num_rows; $x++) {
                            $row = $patients->fetch_assoc();
                            $id = $row["id"];
                            $name = $row["name"];
                            $surname = $row["surname"];
                            $email = $row["email"];
                            $tel = $row["ptel"];
                            $address = $row["address"];
                            $city = $row["city"];
                            $reg_date = $row["reg_date"];


                            echo "<tr>
                                        <td> &nbsp;" . substr($name, 0, 35) . "</td>
                                        <td>
                                        " . substr($surname, 0, 20) . "
                                        </td>
                                     
                                        <td>
                                        " . substr($email, 0, 30) . "
                                         </td> 
                                           <td>
                                            " . substr($tel, 0, 20) . "
                                        </td>
                                        <td>
                                        " . $city . "
                                        </td>
                                           <td>
                                        " . $reg_date . "
                                        </td>
                                        <td >
                                        <div style=\"display:flex;justify-content: center;\">
                                        
                                        <a href=\"../patient.php?action=view&id=" . $id . "\" class=\"non-style-link\"><button  class=\"btn-primary-soft btn button-icon btn-view\"  style=\"padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;\"><font class=\"tn-in-text\">View</font></button></a>
                                        &nbsp;&nbsp;&nbsp;
                                       <a href=\"../../services/delete-patients.php?action=drop&id=" . $id . "&name=" . $name . "\" class=\"non-style-link\"><button  class=\"btn-primary-soft btn button-icon btn-delete\"  style=\"padding-left: 40px;padding-top: 12px;padding-bottom: 12px;margin-top: 10px;\"><font class=\"tn-in-text\">Remove</font></button></a>
                                        </div>
                                        </td>
                                    </tr>";

                        }
                    }

                    ?>
                    


                    </tbody>

                </table>
            </div>

        </div>

    </div>


</section>

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../../assets/js/main.js"></script>
<?php
include("../pages/footer.php");
?>
</body>

</html>



