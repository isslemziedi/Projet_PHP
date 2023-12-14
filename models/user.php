<?php
require_once('../controllers/UserController.php');

// Example usage
$controller = new UserController();

// Register a user
$username = "example_user";
$password = "example_password";
$email = "example@example.com";
$registered = $controller->registerUser("",$username, $password, $email);

if ($registered) {
    echo "User registered successfully.";
} else {
    echo "Failed to register user.";
}

// Get user by username
$usernameToSearch = "example_user";
$user = $controller->getUserByUsername($usernameToSearch);

if ($user) {
    echo "User found: ";
    print_r($user);
} else {
    echo "User not found.";
}

// Get all users
$allUsers = $controller->getAllUsers();

if ($allUsers) {
    echo "All users: ";
    print_r($allUsers);
} else {
    echo "No users found.";
}
?>