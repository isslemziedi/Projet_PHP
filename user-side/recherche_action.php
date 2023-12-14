<?php
require_once('../controllers/ArticleController.php');

$results = array(); 

if (isset($_GET['category']) && isset($_GET['value'])) {
    $category = $_GET['category'];
    $value = $_GET['value'];

    $controller = new ArticleController();
    $results = $controller->recherche($category, $value);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Résultats de la recherche</title>
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

        .table img {
            max-width: 50px;
            max-height: 50px;
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
        

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 100px;
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
        .image-column img {
    max-width: 100%;
    height: auto;
}

    </style>
</head>
<body>
<div class="navbar">
        <h1 class="title">Go Vintage</h1>
        <a href="acceuil.php">Home</a>
        <a href="ajouter.php">Add Article</a>
        <a href="supp.php">Delete Article</a>
        <a href="affichearticle.php">List articles </a>
        <a href="modife.html">Modify Article </a>
        <a href="recherche.html">Search Article</a>
        <a href="listeuser.php">Liste Commands</a>

    </div>

<div class="container">
    <h2>Résultats de la recherche</h2>

    <?php
    
    require_once('../controllers/ArticleController.php');

    if (isset($_GET['category']) && isset($_GET['value'])) {
        $category = $_GET['category'];
        $value = $_GET['value'];

        $controller = new ArticleController();
        $results = $controller->recherche($category, $value);

        if ($results) {
            
            echo "<table  border='1'>";
            echo "<tr><th>ID Article</th><th>Nom</th><th>Description</th><th>Prix</th><th class='image-column'>Image</th></tr>";

            foreach ($results as $result){
                echo "<tr>";
                echo "<td>" . htmlspecialchars($result['idArticle']) . "</td>";
                echo "<td>" . htmlspecialchars($result['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($result['description']) . "</td>";
                echo "<td>" . htmlspecialchars($result['prix']) . "</td>";
                $imagePath = 'images/' . htmlspecialchars($result['image']);
                echo "<td class='image-column'><img class='responsive-image' src='$imagePath' alt='Image' style='width:100px;'></td>";
                echo "</tr>";
            }
            echo "</table>";

        } else {
            echo "Aucun résultat trouvé.";
        }
    } else {
        echo "Veuillez fournir des données de recherche.";
    }
    ?>
</div>

<div class="footer">
        <div class="contact-icons">
            <p class="contact-line"><i class="fas fa-phone"></i>Contact Us: # ( +71 7569834142 )&nbsp;&nbsp;</p>
            <p class="contact-line"><i class="far fa-envelope"></i>Email: GoVintage@gmail.com</p>
            <p><i class="fas fa-map-marker-alt"></i>Address: 104 New York, US</p>
        </div>
    </div>
</body>
</html>