<?php
require_once('Modele.php'); 
require_once('User.php');   


$user = new User();


$listeUtilisateurs = $user->listeUtilisateurs();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Utilisateurs</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Liste des Utilisateurs</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom d'utilisateur</th>
                    <th>Email</th>
               
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listeUtilisateurs as $utilisateur) { ?>
                    <tr>
                        <td><?php echo $utilisateur['idUser']; ?></td>
                        <td><?php echo $utilisateur['username']; ?></td>
                        <td><?php echo $utilisateur['email']; ?></td>
                    
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>