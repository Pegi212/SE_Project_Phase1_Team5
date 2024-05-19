<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../services/userService.php';

class UserServiceTest extends TestCase
{
    private $userService;
    private $db;

    protected function setUp(): void
    {
        $this->userService = new UserService();
        $this->db = DbConfig::getConnection();
    }

    // Test cases for createUser
    public function testCreateUserSuccess()
    {
        $result = $this->userService->createUserP('p', 'newuser', 'password123');
        $this->assertTrue($result);
    }

 
    // Test cases for getUser
    public function testGetUserExistingId()
    {
        $user = $this->userService->getUser(3);
        $this->assertIsArray($user);
        $this->assertEquals('3', $user['uid']);
    }

    public function testGetUserNonExistingId()
    {
        $user = $this->userService->getUser(999);
        $this->assertNull($user);
    }

    // Test cases for updateUser
    public function testUpdateUserSuccess()
    {
        $result = $this->userService->updateUser(1, 'user', 'updateduser', 'newpassword123');
        $this->assertTrue($result);
    }

   

    // Test cases for deleteUser
    public function testDeleteUserExistingId()
    {
        $result = $this->userService->deleteUser(2);
        $this->assertTrue($result);
    }



    // Test cases for listUsers
    public function testListUsersNotEmpty()
    {
        $users = $this->userService->listUsers();
        $this->assertNotEmpty($users);
    }

   

    // Test cases for getPatients
    public function testGetPatientsNotEmpty()
    {
        $patients = $this->userService->getPatients();
        $this->assertNotEmpty($patients);
    }

 

    // Test cases for getDoctors
    public function testGetDoctorsNotEmpty()
    {
        $doctors = $this->userService->getDoctors();
        $this->assertNotEmpty($doctors);
    }



    // Test cases for getSpecialities
    public function testGetSpecialitiesNotEmpty()
    {
        $specialities = $this->userService->getSpecialities();
        $this->assertNotEmpty($specialities);
    }

  

    protected function tearDown(): void
    {
        // Clean up your database or mock objects here
    }
}
