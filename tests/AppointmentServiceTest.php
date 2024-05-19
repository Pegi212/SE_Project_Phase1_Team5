<?php
use PHPUnit\Framework\TestCase;

require_once  __DIR__ . '/../services/appointmentService.php';

class AppointmentServiceTest extends TestCase
{
    private $appointmentService;
    private $db;

    /**
     * @throws Exception
     */
    protected function setUp(): void
    {
        $this->appointmentService = new AppointmentService();
        $this->db = DbConfig::getConnection();
    }

    // Test cases for bookAppointment
    public function testBookAppointmentSuccess()
    {
        // Simulate POST request for successful booking
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST['doc_id'] = '1';
        $_POST['id'] = '3';
        $_POST['date'] = '2025-05-10';
        $_POST['time'] = '10:00';

        // Expect output to contain success message
        $this->expectOutputRegex('/Appointment booked successfully/');
        $this->appointmentService->addBooking();
    }

 

    // Test cases for getAppointment
    public function testGetAppointmentExistingId()
    {
        // Use a known appointment ID that exists
        $appointment = $this->appointmentService->getAppointment(8);

        // Assert the expected outcome
        $this->assertIsArray($appointment);
        $this->assertEquals('8', $appointment['app_id']);
    }

    public function testGetAppointmentNonExistingId()
    {
        // Use a non-existing appointment ID
        $appointment = $this->appointmentService->getAppointment(999);

        // Assert the expected outcome
        $this->assertNull($appointment);
    }

    // Test cases for updateAppointment
    public function testUpdateAppointmentSuccess()
    {
        // Call the method with new data for existing appointment
        $result = $this->appointmentService->updateAppointment(1, '2', '1', '2024-05-11', '11:00');

        // Assert the expected outcome
        $this->assertTrue($result);
    }

   

    // Test cases for cancelAppointment
    public function testCancelAppointmentExistingId()
    {
        // Call the method with an existing appointment ID
        $result = $this->appointmentService->cancelAppointment(1);

        // Assert the expected outcome
        $this->assertTrue($result);
    }

  

    // Test cases for listAppointments
    public function testListAppointmentsNotEmpty()
    {
        // Call the method
        $appointments = $this->appointmentService->listAppointments();

        // Assert the expected outcome
        $this->assertNotEmpty($appointments);
    }

   

    protected function tearDown(): void
    {
        // Clean up your database or mock objects here
    }
}
