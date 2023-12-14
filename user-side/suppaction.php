<?php
require_once('../controllers/ArticleController.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idArticle = $_POST['i'];

    $controller = new ArticleController();

    try {
        $rowsAffected = $controller->delete($idArticle);

        if ($rowsAffected > 0) {
            header("Location: affichearticle.php");
            exit();
        } elseif ($rowsAffected === 0) {
            echo "No matching article found for deletion.";
        } else {
            echo "Failed to delete article. An unexpected error occurred.";
        }
    } catch (PDOException $e) {
        echo "Failed to delete article. Database error: " . $e->getMessage();
    }
}
?>
