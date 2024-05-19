<?php
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


    // Add constructor and getters/setters here

    /**
     * @param $doc_id
     * @param $email
     * @param $doclinic
     * @param $password
     * @param $name
     * @param $surname
     * @param $country
     * @param $city
     * @param $address
     * @param $specialties
     * @param $telephone
     * @param $department
     */
    public function __construct($doc_id, $email, $doclinic, $password, $name, $surname, $country, $city, $address, $specialties, $telephone, $department)
    {
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

    /**
     * @return mixed
     */
    public function getDocId()
    {
        return $this->doc_id;
    }

    /**
     * @param mixed $doc_id
     */
    public function setDocId($doc_id)
    {
        $this->doc_id = $doc_id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getDoclinic()
    {
        return $this->doclinic;
    }

    /**
     * @param mixed $doclinic
     */
    public function setDoclinic($doclinic)
    {
        $this->doclinic = $doclinic;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getSpecialties()
    {
        return $this->specialties;
    }

    /**
     * @param mixed $specialties
     */
    public function setSpecialties($specialties)
    {
        $this->specialties = $specialties;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param mixed $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }



}

?>
