<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/bootstrap.min.css">
    <link rel="stylesheet" href="style/bootstrap.min.css.map">
    <title>Document</title>
</head>
<body class="bod">
<div id="loginform">
  
  <div id="mainregister">
    <h1>Inscrivez-vous</h1>
    <form name="register" action="index.php" method="post">
      <input class="input" type="text" placeholder="nom" name="nom" required />
      <input class="input" type="text" placeholder="prenom" name="prenom" required />
      <input class="input" type="text" placeholder="Pseudo" name="pseudo" required />
      <input class="input" type="password" placeholder="Mot de passe" name="mot_de_passe" required  />
      <!-- <input class="input" type="password" placeholder="Confirmez votre mot de passe" name="passconfirm" required  /> -->
      <input class="input" type="email" placeholder="Votre adresse mail" name="email" required  />
      <input class="input" type="text" placeholder="Poste" name="poste" required  />
      <input type="submit" name="submit" value="Inscription" class="nav_bouton_connect" />
    </form>
    <div id="note"><span>*Remplissez tous les champs, merci.</span></div>
    <br />
  </div>
</div>
<script src="script/type.js"></script>
</body>
</html>


<?php
include ('connexion.php');
$sql= "SELECT email mot_de_passe FROM administrateurs";
$result=$conn ->query($sql);
if($result->rowCount() == 0){
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $pseudo = $_POST['pseudo'] ?? '';
    $mot_de_passe = $_POST['mot_de_passe'] ?? '';
    $email = $_POST['email'] ?? '';
    $poste = $_POST['poste'] ?? '';

        // Préparer la requête SQL pour insérer les données dans la table
        $stmt = $conn->prepare("INSERT INTO administrateurs (nom, prenom, pseudo, mot_de_passe, email, poste) VALUES (:nom, :prenom, :pseudo, :mot_de_passe, :email, :poste)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':pseudo', $pseudo); 
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':poste', $poste);
        $stmt->execute();

        echo "Inscription réussie !";
    } 
}else{
  header('location: inscription.php');
}
?>



