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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <title>Add Article</title>
    <style>
        body {
            font-family: 'Recoletta Semi Bold', serif;
            margin: 0;
            padding: 0;
            background-color: #F2F2F0;
            color: grey;
            font-size: 14px;
            line-height: 1.42857143;
        }

        .navbar {
            background-color: #A4968D;
            overflow: hidden;
            padding: 15px;
            text-align: right;
            color: #ffbfbf;
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
            color: #ffbfbf;
            font-family: 'Recoletta Semi Bold', serif;
            font-size: 28px;
        }

        .navbar a {
            display: inline-block;
            text-decoration: none;
            padding: 14px 16px;
            color: #ffbfbf;
            font-family: 'Recoletta Semi Bold', serif;
            font-size: 18px;
            text-decoration: solid;
        }

        .navbar a:hover {
            background-color: #FFF;
            color: #ffbfbf;
        }

        .navbar h1.title {
            margin: 0;
            color: #ffbfbf;
            font-family: 'Recoletta Semi Bold', serif;
        }

        form {
            background-color: #FFF;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 50px auto;
            text-align: left;
            margin-top: 10%;
            margin-bottom:10%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: grey;
            font-weight: bold;
            font-size: 18px; 
        }

        input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 12px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        input[type="file"] {
            cursor: pointer;
        }

        .custom-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .custom-buttons button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: 'Recoletta Semi Bold', serif; 
        }

        .custom-buttons #add-btn {
            background-color: #ffbfbf;
            color: white;
            margin-right: 10px;
        }

        .custom-buttons #add-btn:hover {
            background-color: #A4968D;
        }

        .custom-buttons #cancel-btn {
            background-color: #ffbfbf;
            color: white;
            margin-left: 10px;
        }

        .custom-buttons #cancel-btn:hover {
            background-color: #A4968D;
        }
        .footer {
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            white-space: nowrap;
            background-color: #A4968D;
            color:#ffbfbf;
        }

        .footer p {
            margin: 10px 0;
            display: inline-block;
        }
        .contact-icons {
            text-align: center;
        }

        .contact-icons p {
            margin-bottom: 10px;
        }

        .contact-icons i {
            margin-right: 10px;
            font-size: 20px;
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
    <form action="ajoutaction.php" method="post" enctype="multipart/form-data">
        <label>ID Article:</label> <input type="text" name="idArticle">
        <label>Name:</label><input type="text" name="nom">
        <label>Description:</label><input type="text" name="description">
        <label>Price:</label><input type="number" name="prix">
        <label>Image:</label>
        <input type="file" name="image" id="image" accept="images/*" required>

        <div class="custom-buttons">
            <button id="add-btn" type="submit">Add</button>
            <button id="cancel-btn" type="reset">Cancel</button>
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
