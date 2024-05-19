<?php
class User {
    private $email;
    private $usertype;

    public function __construct($email, $usertype) {
        $this->email = $email;
        $this->usertype = $usertype;
    }

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
?>
