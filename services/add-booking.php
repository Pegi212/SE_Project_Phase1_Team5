<?php

session_start();
require_once __DIR__ . '/userService.php';
$userService = new UserService();
require_once __DIR__ . '/appointmentService.php';
$appointmentService = new AppointmentService();
if (isset($_SESSION["user"])) {
    if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
        header("location: ../login.php");
    }

} else {
    header("location: ../login.php");
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $docId = $_POST['doc_id'];
    $pid = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];


    if ($appointmentService->addBooking($docId, $pid, $date, $time)) {
        // Insertion successful
        echo "<center><h1>Appointment booked successfully.</h1> <a href='../views/patient/appointments.php'><button class='btn-success'>OK</button></a></center>";
    } else {
        // Error occurred
        echo "Error:booking  ";
    }


}

?>

