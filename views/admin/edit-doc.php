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

//learn from w3schools.com

session_start();
require_once __DIR__ . '/../../services/userService.php';
$userService = new UserService();
require_once __DIR__ . '/../../services/appointmentService.php';
$appointmentService = new AppointmentService();
if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'a') {
        header("location: ../pages/login.php");
    }

} else {
    header("location: ../pages/login.php");
}


if ($_GET) {
    $id = $_GET["id"];
    $action = $_GET["action"];
    $user = $userService->getUser($id)->fetch_assoc();
    $doctorByEmail = $userService->getDoctorByEmail($user["email"]);
    $row = $doctorByEmail->fetch_assoc();
    $name = $row["name"];
    $surname = $row["surname"];
    $email = $row["email"];
    $spe = $row["specialties"];
    $address = $row["address"];
    $spcil_name = $spe;
    $clinic = $row['docclinic'];
    $tele = $row['telephone'];
    $dep = $row['telephone'];

}

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
            <a href="https://instagram.com/Alb Esthetics.al?igshid=MmJiY2I4NDBkZg==" class="instagram"><i
                        class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/in/diun-olla-192685279" class="linkedin"><i
                        class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
        <img src="../../assets/img/logo.png" width="60px" height="60px">
        <h1 class="logo me-auto"><a href="index.php">
                Edit doctor (ID:<?php echo $id ?> )
            </a></h1>


        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto " href="index.php">Home</a></li>
                <li><a class="nav-link scrollto " href="doctors.php">Doctors</a></li>
                <li><a class="nav-link scrollto" href="appointment.php">Appointment</a></li>
                <li><a class="nav-link scrollto" href="patients.php">Patients </a></li>

                <li><a href="../../services/logoutService.php"><input type="button" value="Log out"
                                                                      class="logout-btn btn-primary-soft btn"></a>
                </li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->


<main>

    <section>
        <div class="container mt-5 pt-5 w-50 h-auto d-grid">

            <form action="../../services/update-doctor.php" method="POST" class="add-new-form">
                <label for="Email" class="form-label">Email: </label>
                <input type="hidden" value="' <?php echo $id ?> '" name="id00">
                <input type="hidden" name="oldemail" value="<?php echo $email ?>">
                </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="email" name="email" class="input-text" placeholder="Email Address"
                               value="<?php echo $email ?>" required><br>
                    </td>
                </tr>
                <tr>

                    <td class="label-td" colspan="2">
                        <label for="name" class="form-label">Name: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="name" class="input-text" placeholder="Doctor Name"
                               value=" <?php echo $name; ?>" required><br>
                    </td>

                </tr>
                <tr>

                    <td class="label-td" colspan="2">
                        <label for="name" class="form-label">Surname: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="surname" class="input-text" placeholder="Doctor Surname"
                               value="<?php echo $surname; ?>" required><br>
                    </td>

                </tr>

                <tr>
                    <td class="label-td" colspan="2">
                        <label for="nic" class="form-label">Clinic: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="text" name="nic" class="input-text" placeholder="NIC Number"
                               value="<?php echo $clinic ?>" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="Tele" class="form-label">Telephone: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="tel" name="Tele" class="input-text" placeholder="Telephone Number"
                               value="<?php echo $tele ?>" required><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="spec" class="form-label">Choose specialties: (Current <?php echo $spcil_name ?>
                            )</label>

                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <select name="spec" id="" class="box">';

                            <?php
                            $list11 = $userService->getSpecialities();

                            for ($y = 0; $y < $list11->num_rows; $y++) {
                                $row00 = $list11->fetch_assoc();
                                $sn = $row00["sname"];
                                $id00 = $row00["id"];
                                echo "<option value=" . $id00 . ">$sn</option><br/>";
                            };


                            ?>

                        </select><br><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="password" class="form-label">Password: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="password" class="input-text" placeholder="Change  Password"><br>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <label for="cpassword" class="form-label">Confirm Password: </label>
                    </td>
                </tr>
                <tr>
                    <td class="label-td" colspan="2">
                        <input type="password" name="cpassword" class="input-text" placeholder="Confirm Password"><br>
                    </td>
                </tr>


                <tr>
                    <td colspan="2">
                        <input type="reset" value="Reset" class="login-btn btn-primary-soft btn">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <input type="submit" value="Save" class="login-btn btn-primary btn">
                    </td>

                </tr>

            </form>


        </div>


    </section>
</main>
<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


<?php

//
//if ($_POST) {
//    $name = $_POST['name'];
//    $surname = $_POST['surname'];
//    $clinic = $_POST['clinic'];
//    $email = $_POST['email'];
//    $spec = $_POST['spec'];
//    $address = $_POST['address'];
//    $city = $_POST['city'];
//    $tele = $_POST['Tele'];
//    $password = $_POST['password'];
//    $cpassword = $_POST['cpassword'];
//    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//    if ($userService->createUserD($name, $surname, $email, $address, $city, $clinic, $tele, $spec, $hashedPassword, "d")) {
//        echo "Doctor added successfully";
//    } else {
//        echo "Error adding Doctor ";
//
//    }
//
//
//}

include("../pages/footer.php");


?>
<!-- Template Main JS File -->
<script src="../../assets/js/main.js"></script>

<!-- Vendor JS Files -->
<script src="../../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>

</body>

</html>
