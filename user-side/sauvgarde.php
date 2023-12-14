<?php
/*
// Vérifie si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les valeurs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $prix = $_POST['prix'];
    $qtestock = $_POST['qtestock'];

    // Connexion à la base de données avec PDO
    $dsn = "mysql:host=localhost;dbname=votre_base_de_donnees;charset=utf8mb4";
    $utilisateur = "votre_utilisateur";
    $motDePasse = "votre_mot_de_passe";

    try {
        $connexion = new PDO($dsn, $utilisateur, $motDePasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // Exemple d'insertion dans la base de données
        $requete = $connexion->prepare("INSERT INTO qrticle (nom, prenom, email, prix, qtestock) VALUES (:nom, :prenom, :email, :prix, :qtestock)");
        $requete->bindParam(":nom", $nom);
        $requete->bindParam(":prenom", $prenom);
        $requete->bindParam(":email", $email);
        $requete->bindParam(":prix", $prix);

        $requete->execute();

        // Redirection ou autre logique après l'insertion
        header("Location: page_success.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }
}
*/
?>