<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Alb Esthetics</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/logo.png" rel="icon">
    <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/adm.css" rel="stylesheet">


</head>

<body>
<?php

//learn from w3schools.com

session_start();
require_once __DIR__ . '/../services/userService.php';
$userService = new UserService();
require_once __DIR__ . '/../services/appointmentService.php';
$appointmentService = new AppointmentService();


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
    $spcil_name = $userService->getSpecialitieById($spe)->fetch_assoc()["sname"];
    $clinic = $row['docclinic'];
    $tele = $row['telephone'];
    $dep = $row['telephone'];

} else header('Location: ./doctors.php');

?>


<center>
    <h2></h2>
    <a class="close text-danger" href="<?php
    if ($_SESSION['usertype'] == "a") {
        echo "admin/doctors.php";
    } elseif ($_SESSION['usertype'] == "p") {
        echo "patient/patients.php";
    } else {
        echo "../";

    }
    ?>">&times; close</a>
    <div class="content">

<br>
    </div>
    <div style="display: flex;justify-content: center;">
        <table width="80%" class="sub-table scrolldown add-doc-form-container"


        <tr>
            <td>
                <p style="padding: 0;margin: 0;text-align: left;font-size: 25px;font-weight: 500;">View Doctor
                    Details.</p><br><br>
            </td>
        </tr>

        <tr>

            <td class="label-td" colspan="2">
                <label for="name" class="form-label">Name: <?php echo $name ?></label>
            </td>
        </tr>

        <tr>

            <td class="label-td" colspan="2">
                <label for="spec" class="form-label">Surname: <?php echo $surname ?></label>

            </td>
        </tr>

        <tr>
            <td class="label-td" colspan="2">
                <label for="Email" class="form-label">Email: <?php echo $email ?></label>
            </td>
        </tr>

        <tr>
            <td class="label-td" colspan="2">
                <label for="nic" class="form-label">Clinic: <?php echo $clinic ?></label>
            </td>
        </tr>


        <tr>
            <td class="label-td" colspan="2">
                <label for="nic" class="form-label">Speciality:<?php echo $spcil_name ?> </label>
            </td>
        </tr>


        <tr>
            <td class="label-td" colspan="2">
                <label for="Tele" class="form-label">Telephone: <?php echo $tele ?> </label>
            </td>
        </tr>


        <tr>
            <td class="label-td" colspan="2">
                <label for="spec" class="form-label">Address:<?php echo $spcil_name ?> </label>

            </td>
        </tr>


        </table>
    </div>
</center>


<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


<?php

include("./pages/footer.php");


?>
<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

<!-- Vendor JS Files -->
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

</body>

</html>



