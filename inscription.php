<?php
include('connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $email = $_POST['email'] ?? '';
    $poste = $_POST['poste'] ?? '';

    // Vérifier si le pseudo existe déjà dans la base de données
    $checkQuery = "SELECT * FROM administrateurs WHERE pseudo = :pseudo";
    $checkStatement = $conn->prepare($checkQuery);
    $checkStatement->bindParam(':pseudo', $pseudo);
    $checkStatement->execute();

    if ($checkStatement->rowCount() == 0) {
        // Préparer la requête SQL pour insérer les données dans la table
        $insertQuery = "INSERT INTO administrateurs (nom, prenom, pseudo, mot_de_passe, email, poste) VALUES (:nom, :prenom, :pseudo, :mot_de_passe, :email, :poste)";
        $insertStatement = $conn->prepare($insertQuery);
        $insertStatement->bindParam(':nom', $nom);
        $insertStatement->bindParam(':prenom', $prenom);
        $insertStatement->bindParam(':pseudo', $pseudo);
        $insertStatement->bindParam(':mot_de_passe', $mot_de_passe);
        $insertStatement->bindParam(':email', $email);
        $insertStatement->bindParam(':poste', $poste);
        $insertStatement->execute();

        // Rediriger vers index.php après une inscription réussie
        header("Location: index.php");
        exit();
    } else {
        echo "Ce pseudo existe déjà. Veuillez choisir un autre pseudo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css.map">
    <title>Inscription</title>
</head>
<body class="bod">
<div id="loginform">
  
  <div id="mainregister">
    <h1>Inscrivez-vous</h1>
    <form name="register" method="POST">
      <input class="input" type="text" placeholder="Nom" name="nom" required />
      <input class="input" type="text" placeholder="Prénom" name="prenom" required />
      <input class="input" type="text" placeholder="Pseudo" name="pseudo" required />
      <input class="input" type="password" placeholder="Mot de passe" name="mot_de_passe" required />
      <input class="input" type="email" placeholder="Votre adresse mail" name="email" required />
      <input class="input" type="text" placeholder="Poste" name="poste" required />
      <input type="submit" name="submit" value="Inscription" class="nav_bouton_connect" />
    </form>
    <div id="note"><span>*Remplissez tous les champs, merci.</span></div>
    <br />
  </div>
</div>
<script src="script/type.js"></script>
</body>
</html>
