<?php

class User {
    private $email;
    private $usertype;

    public function __construct($email, $usertype) {
        $this->email = $email;
        $this->usertype = $usertype;
    }

    // Getters and setters
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getUsertype() {
        return $this->usertype;
    }

    public function setUsertype($usertype) {
        $this->usertype = $usertype;
    }
}

class Admin {
    private $email;
    private $password;

    public function __construct($email, $password) {
        $this->email = $email;
        $this->password = $password;
    }

    // Getters and setters
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }
}

class Doctor {
    private $doc_id;
    private $email;
    private $doclinic;
    private $password;
    private $name;
    private $surname;
    private $country;
    private $city;
    private $address;
    private $specialties;
    private $telephone;
    private $department;

    public function __construct($doc_id, $email, $doclinic, $password, $name, $surname, $country, $city, $address, $specialties, $telephone, $department) {
        $this->doc_id = $doc_id;
        $this->email = $email;
        $this->doclinic = $doclinic;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->country = $country;
        $this->city = $city;
        $this->address = $address;
        $this->specialties = $specialties;
        $this->telephone = $telephone;
        $this->department = $department;
    }

    // Getters and setters
    // ... (Implement getters and setters for each property)
}

class Patient {
    private $id;
    private $name;
    private $surname;
    private $email;
    private $address;
    private $country;
    private $city;
    private $reg_date;
    private $ptel;
    private $password;

    public function __construct($id, $name, $surname, $email, $address, $country, $city, $reg_date, $ptel, $password) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->address = $address;
        $this->country = $country;
        $this->city = $city;
        $this->reg_date = $reg_date;
        $this->ptel = $ptel;
        $this->password = $password;
    }

    // Getters and setters
    // ... (Implement getters and setters for each property)
}

class Specialty {
    private $id;
    private $sname;

    public function __construct($id, $sname) {
        $this->id = $id;
        $this->sname = $sname;
    }

    // Getters and setters
    // ... (Implement getters and setters for each property)
}

class Session {
    private $s_time;

    public function __construct($s_time) {
        $this->s_time = $s_time;
    }

    // Getters and setters
    public function getSTime() {
        return $this->s_time;
    }

    public function setSTime($s_time) {
        $this->s_time = $s_time;
    }
}

class Appointment {
    private $app_id;
    private $doc_id;
    private $id;
    private $date;
    private $s_time;

    public function __construct($app_id, $doc_id, $id, $date, $s_time) {
        $this->app_id = $app_id;
        $this->doc_id = $doc_id;
        $this->id = $id;
        $this->date = $date;
        $this->s_time = $s_time;
    }

    // Getters and setters
    // ... (Implement getters and setters for each property)
}

class Subscriber {
    private $email;

    public function __construct($email) {
        $this->email = $email;
    }

    // Getters and setters
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

?>
