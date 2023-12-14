<?php
require_once('../controllers/ArticleController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArticle = $_POST['idArticle'];

    echo "ID Article: $idArticle<br>";
    echo "POST data: <pre>" . print_r($_POST, true) . "</pre>";

    $nom = $_POST['nom'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $existingImage = $_POST['existingImage'];

    echo "Files data: <pre>" . print_r($_FILES, true) . "</pre>";

    $controller = new ArticleController();
    $articleDetails = $controller->getArticle($idArticle);

    if ($articleDetails) {
        $newImage = isset($_FILES['newImage']['name']) ? $_FILES['newImage']['name'] : null;
        $newImageTmpName = isset($_FILES['newImage']['tmp_name']) ? $_FILES['newImage']['tmp_name'] : null;
        $newImagePath = 'images/' . $newImage;

        if (!empty($newImage) && move_uploaded_file($newImageTmpName, $newImagePath)) {
            $image = $newImage;
        } else {
            $image = $existingImage;
        }

        $updatedArticle = new Article($nom, $description, $prix, $image, $idArticle);

        $rowsAffected = $controller->modifierArticle($updatedArticle);

        if ($rowsAffected > 0) {
            header("Location: affichearticle.php");
            exit();
        } else {
            echo "Failed to update article. No rows affected.";
        }
    } else {
        echo "No matching article found for modification.";
    }
} else {
    echo "Invalid request method.";
}
?>