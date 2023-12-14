<?php

include_once("user.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $user = new User("", $username, $password, $email);

    if ($user->inscrire()) {
       
        exit();
    } else {
        $error_message = "Vous êtes déjà inscrit. Bienvenue !";
    }
 
}
?>
<!DOCTYPE html>

 <a href="index.php">voir le boutique</a>