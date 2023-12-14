<?php
include_once('../models/Article.php');
include_once('../database/config.php');

class ArticleController extends Connexion
{
    function __construct()
    {
        parent::__construct();
    }

    function insert(article $a)
    {
        $query = "INSERT INTO article (nom, description, prix, image) VALUES (?, ?, ?, ?)";
        $res = $this->pdo->prepare($query);

        $array = array($a->getNom(), $a->getDescription(), $a->getPrix(), $a->getImage());
        return $res->execute($array);
    }

    function getArticle($idArticle)
    {
        $query = "SELECT * FROM article WHERE idArticle = ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array($idArticle));
        $array = $res->fetch();
        return $array;
    }

    function delete($idArticle)
    {
        $query = "DELETE FROM article WHERE idArticle=?";
        $res = $this->pdo->prepare($query);
        return $res->execute(array($idArticle));
    }

    function liste()
    {
        $query = "SELECT * FROM article";
        $res = $this->pdo->prepare($query);
        $res->execute();
        return $res;
    }

    /*
    function modifierArticle(article $a)
    {
        $sql = "UPDATE article SET nom=?, description=?, prix=?, image=? WHERE idArticle=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($a->getNom(), $a->getDescription(), $a->getPrix(), $a->getImage(), $a->getIdArticle()));
        return $stmt->rowCount();
    }
    */


/*
    function modifierArticle(article $a)
    {
        if (!empty($_FILES['image']['name'])) {
            // Handle file upload
            $image = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imagePath = 'images/' . $image;

            move_uploaded_file($imageTmpName, $imagePath);
            $a->setImage($image);
        }

        $sql = "UPDATE article SET nom=?, description=?, prix=?, image=? WHERE idArticle=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($a->getNom(), $a->getDescription(), $a->getPrix(), $a->getImage(), $a->getIdArticle()));

        return $stmt->rowCount();
    }
    */

    function modifierArticle(article $a)
{
    try {
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $imageTmpName = $_FILES['image']['tmp_name'];
            $imagePath = 'images/' . $image;

            if (!move_uploaded_file($imageTmpName, $imagePath)) {
                $uploadError = isset($_FILES['image']['error']) ? $_FILES['image']['error'] : "unknown";
                throw new Exception("Failed to move uploaded file. Upload error code: $uploadError");
            }

            $a->setImage($image);
        }

        $sql = "UPDATE article SET nom=?, description=?, prix=?, image=? WHERE idArticle=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($a->getNom(), $a->getDescription(), $a->getPrix(), $a->getImage(), $a->getIdArticle()));

        echo "Executed Query: " . $stmt->queryString . "<br>";

        $rowCount = $stmt->rowCount();
        if ($rowCount === 0) {
            throw new Exception("No rows affected. The article may not exist.");
        }

        return $rowCount;
    } catch (Exception $e) {
        error_log("Error in modifierArticle: " . $e->getMessage());
        return false;
    }
}



###############################
    function recherche($category, $value)
    {
        $query = "SELECT * FROM article WHERE $category LIKE ?";
        $res = $this->pdo->prepare($query);
        $res->execute(array("%$value%"));
        $results = $res->fetchAll(PDO::FETCH_ASSOC);

        return $results;
    }
################################################################################################################################
    }

?>
