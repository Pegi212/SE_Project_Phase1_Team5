<?php
// dbconfig.php should be a class, not just a file with variables
// Assume it's a class with a method to get the database connection
require_once __DIR__ . '/../db/DbConfig.php';

class AppointmentService
{
    private $db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->db = DbConfig::getConnection();
    }

    public function addBooking($docId, $pid, $date, $time)
    {
        $sql = "INSERT INTO appointment (doc_id, id, date, s_time) VALUES (?,?,?,?)";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssss", $docId, $pid, $date, $time);
        $result = $stmt->execute();

//        if ($result) {
//            // Insertion successful
//            echo "<center><h1>Appointment booked successfully.</h1> <a href='appointments.php'><button class='btn-success'>OK</button></a></center>";
//        } else {
//            // Error occurred
//            echo "Error: " . $stmt->error;
//        }

        $stmt->close();
        return $result;

    }

    public
    function getAppointment($id)
    {
        $sql = "SELECT * FROM appointment WHERE app_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public
    function updateAppointment($id, $docId, $pid, $date, $time)
    {
        $sql = "UPDATE appointment SET doc_id = ?, pid = ?, date = ?, s_time = ? WHERE app_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("ssssi", $docId, $pid, $date, $time, $id);
        $result = $stmt->execute();
        return $result;
    }

    public
    function cancelAppointment($id)
    {
        $sql = "DELETE FROM appointment WHERE app_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        return $result;
    }

    public
    function listAppointments(): array
    {
        $sql = "SELECT * FROM appointment";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public
    function listAppointmentsByPid($pid): array
    {
        $sql = "SELECT * FROM appointment  where id='" . $pid . "';";
        $result = $this->db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public
    function listAppointmentsByDocId($doc_id)
    {
        $sql = "SELECT * FROM appointment  where doc_id='" . $doc_id . "';";
        return $this->db->query($sql);
    }

    public
    function listAppointmentsByDate($docID, $date)
    {

        $sel_doc_appointments = "SELECT s_time FROM appointment WHERE doc_id='$docID' and date ='$date';";
        return $this->db->query($sel_doc_appointments);

    }

    public
    function getSessions()
    {
        return $this->db->query("select  * from  session;");

    }

    public function deleteAppointment($id, $usertype)
    {
        $this->db->query("delete  from appointment where app_id=$id;");

        if ($usertype == 'a') {
            header('Location: ../views/admin/appointments.php');
        } else {
            header('Location: ../views/patient/appointments.php');

        }

    }


}
