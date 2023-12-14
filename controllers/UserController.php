<?php
require_once('user.php');

class UserController {
    function __construct() {
        // You can add any initialization logic here
    }

    public function registerUser($username, $password, $email) {
        $user = new User("", $username, $password, $email);
        return $user->inscrire();
    }

    public function getUserByUsername($username) {
        $user = new User();
        return $user->getUserByUsername($username);
    }

    public function getAllUsers() {
        $user = new User();
        return $user->listeUtilisateurs();
    }
}
?>