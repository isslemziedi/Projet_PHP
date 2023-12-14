<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <script>
        function confirmDelete(articleId) {
        if (confirm("Are you sure you want to delete this article?")) {
            document.querySelector("form[action='supp.php'] input[name='i']").value = articleId;
            document.querySelector("form[action='supp.php']").submit();
            return false; 
        } else {
            return false; 
        }
    }
    </script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    </script>
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
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 10%;
            margin-bottom: 20%;
        }
        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 18px; 
            font-family: 'Recoletta Semi Bold', serif; 
        }
        th {
            background-color: #ffbfbf;
            color: white;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 18px; 
            font-family: 'Recoletta Semi Bold', serif; 
        }
        img.responsive-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .image-column {
            width: 20%;
        }

        .modify-btn{
            background-color: #7E9680;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            cursor: pointer;
            margin-bottom:20px;

        } .delete-btn {
            background-color: #C98895;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            margin-right: 10px;
            margin-bottom:10px;
            cursor: pointer;
        }

        .modify-btn:hover{
            background-color: #737955; 
        } 
        .delete-btn:hover {
            background-color: #EDAFB8; 
        }

    </style>
</head>
<body>
    <div class="navbar">
        <h1 class="title">Go Vintage</h1>
        <a href="acceuil.php">Home</a>
        <a href="articlesUser.php">List articles </a>
        <a href="searchUser.php">Search Article</a>
        <a href="inscription.php">Command</a>

    </div>
    <?php
    require_once('../controllers/ArticleController.php');
    $controller = new ArticleController();
    $res = $controller->liste('ORDER BY idArticle');

    if ($res) {
        echo "<table>";
        echo "<tr><th>ID Article</th><th>Nom</th><th>Description</th><th>Prix</th><th class='image-column'>Image</th></tr>";

        while ($l = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td style='text-align:center;'>" . htmlspecialchars($l['idArticle']) . "</td>";
            echo "<td style='text-align:center;'>" . htmlspecialchars($l['nom']) . "</td>";
            echo "<td style='text-align:center;'>" . htmlspecialchars($l['description']) . "</td>";
            echo "<td style='text-align:center;'>" . htmlspecialchars($l['prix']) . "</td>";
            echo "<td class='image-column' style='text-align:center;'><img class='responsive-image' src='" . htmlspecialchars($l['image']) . "' alt='Image'></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Problème lors de l'exécution de la requête.";
    }
    ?>
    <div class="footer">
        <div class="contact-icons">
            <p class="contact-line"><i class="fas fa-phone"></i>Contact Us: # ( +71 7569834142 )&nbsp;&nbsp;</p>
            <p class="contact-line"><i class="far fa-envelope"></i>Email: GoVintage@gmail.com</p>
            <p><i class="fas fa-map-marker-alt"></i>Address: 104 New York, US</p>
        </div>
    </div>
</body>
</html>

