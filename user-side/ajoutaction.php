<?php
require_once('../controllers/ArticleController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArticle = $_POST['idArticle'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];

    $targetDirectory = "images/"; 
    $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image = $targetFile;

    $controller = new ArticleController();
    $article = new article($idArticle, $nom, $description, $prix,$image);
    
    $controller->insert($article);

    header("Location: affichearticle.php");
        exit();
} else {
    echo "Sorry, there was an error uploading your file.";
}
}
?>