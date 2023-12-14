<?php

session_start();

if (isset($_SESSION["admin_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM admin
            WHERE id = {$_SESSION["admin_id"]}";
            
    $result = $mysqli->query($sql);
    
    $admin = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this article?");
        }
    </script>
    <style>
          
          body {
            font-family: 'Recoletta Semi Bold', serif;
            margin: 0;
            padding: 0;
            background-color: #F2F2F0; 
            color: #ffbfbf; 
            font-size: 14px;
            line-height: 1.42857143;
        }
        .navbar {
            background-color: #A4968D;
            overflow: hidden;
            padding: 15px;
            text-align: right;
            color:#ffbfbf; 
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 99;
        }
        .navbar .title {
            text-align: left;
            float: left;
            margin: 0;
            color:#ffbfbf;
            font-family:'Recoletta Semi Bold', serif;
            font-size: 28px; 
        }

        .navbar a {
            display: inline-block;
            text-decoration: none;
            padding: 14px 16px;
            color:#ffbfbf;
            font-family: 'Recoletta Semi Bold', serif; 
            font-size: 18px; 
            text-decoration: solid;
        }

        .navbar a:hover {
            background-color: #FFF;
            color: #ffbfbf; 
        }

        .container {
            
            padding: 20px;
        }

        .footer {
            text-align: center;
            padding: 30px;
            position: fixed;
            bottom: 0;
            width: 100%;
            white-space: nowrap;
            background-color: #A4968D;
            color:#ffbfbf;
        }

        .contact-icons {
            text-align: center;
            margin: 0; 
        }

        .contact-icons p {
            display: inline-block;
            margin: 0; 
        }

        .contact-icons i {
            margin-right: 10px;
            font-size: 20px;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            margin: 30px auto;
            text-align: left;
            margin-top: 175px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: grey;
            font-weight: bold;
            font-size: 24px; 
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #ffbfbf;
            color: white;
            cursor: pointer;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            font-size: 18px;
            transition: background-color 0.3s;
            font-family: 'Recoletta Semi Bold', serif; 
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #A4968D;
        }
        
        
        .user-info {
            display: flex;
            align-items: center;
            background-color:white;
            display: inline-block;
            margin-right:-20%;
            font-family: 'Recoletta Semi Bold', serif;
            font-size: 18px; 
            text-decoration: solid;
        }

        .user-info p {
            margin: 0 15px; 
            color: black;
        }
        .user-info a{
            color: green;
            text-decoration: underline;
        }


    </style>
</head>

<body>

    <div class="navbar">
        
    <h1 class="title">Go Vintage</h1>
        <a href="acceuil.php">Home</a>
        <a href="affichearticle.php">List articles </a>
        <a href="ajouter.php">Add Article</a>
        <a href="supp.php">Delete Article</a>
        <a href="recherche.php">Search Article</a>
        <a href="listeuser.php">Liste Commands</a>

        <?php if (isset($admin)): ?>
        <div class="user-info">
        
            <p>Hello <?= htmlspecialchars($admin["name"]) ?></p>
            <p><a href="logout.php">Log out</a></p>
        </div>
        <?php else: ?>
        
            <p><a href="login.php">Log in</a> 
            or 
            <a href="sign up.html">sign up</a></p>
        
        <?php endif; ?>



    </div>

    <form action="suppaction.php" method="post" onsubmit="return confirmDelete();">
    <label for="articleId">ID Article to delete:</label>
    <input type="text" id="articleId" name="i" value="<?php echo isset($_GET['id']) ? $_GET['id'] : ''; ?>" readonly>

    <div style="text-align: center;">
        <input type="submit" value="Delete">
        <input type="reset" value="Cancel">
    </div>
</form>
    
    <div class="footer">
        <div class="contact-icons">
            <p class="contact-line"><i class="fas fa-phone"></i>Contact Us: # ( +71 7569834142 )&nbsp;&nbsp;</p>
            <p class="contact-line"><i class="far fa-envelope"></i>Email: GoVintage@gmail.com</p>
            <p><i class="fas fa-map-marker-alt"></i>Address: 104 New York, US</p>
        </div>
    </div>

</body>

</html>
