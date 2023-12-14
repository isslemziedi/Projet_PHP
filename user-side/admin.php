<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = "isslem";
    $password = "0000";

    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        $_SESSION['user_id'] = 1;
        header("Location: acceuil.php");  
        exit();
    } else {
        $error_message = "Identifiants incorrects";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Georgia', serif; 
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #F3EFEF; 
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); 
        }

        .login-container {
            background-color: #FFF;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        h2 {
            color: #573E3E; 
            margin-bottom: 20px;
            font-family: 'Dancing Script', cursive; 
            font-size: 28px; 
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #573E3E; 
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #D7A496; 
            color: #FFF;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #AE8068; 
        }

        p.error {
            color: red;
            margin-top: 10px;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #573E3E; 
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        
        <?php if (isset($error_message)) { ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php } ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" class="form-control" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>

            <input type="submit" value="Login" class="btn btn-primary">
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
</body>
</html>

