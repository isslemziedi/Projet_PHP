<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM admin
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $admin = $result->fetch_assoc();
    
    if ($admin) {
        
        if (password_verify($_POST["password"], $admin["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["admin_id"] = $admin["id"];
            
            header("Location: acceuil.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f4f8;
    color: #333;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    display: flex;
    align-items: center;
}

.login-container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 420px;
    width: 120%;
    box-sizing: border-box; 
    margin-left:220px;
}

h1 {
    text-align: center;
    color:#EFC3CA;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-size: 14px;
    margin-bottom: 8px;
    color: #A4968D;
}

input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    margin-bottom: 8px;
}

button {
    background-color: #EFC3CA;
    color: #fff;
    padding: 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
}

button:hover {
    background-color: #A4968D;
}

.error-message {
    color: #e44d87;
    font-style: italic;
    margin-top: 10px;
}

.image-container2{
    margin-left: 20px; 
    margin-right: -430px;
    margin-top: -20px;
}
.image-container1{
    margin-left: 20px; 
    margin-left: 140px;
    margin-top: -30px;
}
.img1{
    max-width: 200%;
    height: auto;
    border-radius: 8px;
    width: 250px;
    margin-top: 10px;
    margin-right:50px;
}

.img2{
    max-width: 150%;
    height: auto;
    border-radius: 8px;
    margin-left: 180px;
    width: 220px;
}

    </style>
</head>

<body>
<div class="container">
    <div class="image-container1">
        <img src="images/login2.png" alt="Girly Image" class="img1">
    </div>
    <div class="login-container">
    <h1>Login</h1>
    
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
    <div class="form-group">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
        <button>Log in</button>
    </form>
    </div>
    <div class="image-container2">
        <img src="images/login1.png" alt="Girly Image" class="img2">
    </div>
</div> 
    
</body>
</html>