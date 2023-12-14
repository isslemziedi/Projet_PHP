<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
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
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 20px auto;
            text-align: left;
            margin-top: 180px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: grey;
            font-weight: bold;
            font-size: 18px; 
        }
        input,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }

        button {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 4px;
            font-size: 17px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: 'Recoletta Semi Bold', serif; 
            background-color: #ffbfbf;
            color: white;
            margin-right: 10px;
        }
        button:hover {
            background-color:  #A4968D;
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

        .text-right {
            text-align: right;
        }
    </style>
    <title>Rechercher un article</title>
</head>
<body>

    <div class="navbar">
    <h1 class="title">Go Vintage</h1>
        <a href="acceuil.php">Home</a>
        <a href="articlesUser.php">List articles </a>
        <a href="searchUser.php">Search Article</a>
        <a href="inscription.php">Command</a>

    </div>
    <form action="recherche.php" method="get" enctype="multipart/form-data">
        <label for="category">Rechercher par:</label>
        <select id="category" name="category" required>
            <option value="nom">Nom</option>
            <option value="description">Description</option>
        </select>
        <label for="value">Valeur:</label>
        <input type="text" id="value" name="value" required>
        <button type="submit">Rechercher</button>
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