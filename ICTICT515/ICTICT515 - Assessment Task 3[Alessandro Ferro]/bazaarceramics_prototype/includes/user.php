<?php
class User {
    public $id;
    public $img;
    public $first_name;
    public $last_name;
    public $email;
    public $password;

    function __construct($img, $first_name, $last_name, $email, $password) {
        $this->img = $img;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
    }
}
?>