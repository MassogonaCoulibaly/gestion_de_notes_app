<?php
include('connexion.php');
// Vérifier si le formulaire de connexion a été soumis
if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Effectuer la requête pour vérifier les informations de connexion
    $query = "SELECT * FROM administrateurs WHERE pseudo = :pseudo AND mot_de_passe = :mot_de_passe";
    $statement = $conn->prepare($query);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':mot_de_passe', $mot_de_passe);
    $statement->execute();

    // Vérifier si les informations de connexion sont valides
    if ($statement->rowCount() == 1) {
        // Rediriger vers la page souhaitée pour une connexion réussie
        header("Location: espaceadmi.php");
        exit();
    } else {
        // Rediriger vers la page d'inscription si les informations de connexion sont invalides
        header("Location: inscription.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/css/bootstrap.min.css.map">
    <link rel="stylesheet" href="style/style.css">
    <title>Se connecter</title>
</head>
<body class="bod">
    <div id="loginform">
        <div id="mainlogin">
            <h1>Se connecter</h1>
            <form name="connect" method="POST">
                <input class="input" type="text" placeholder="Pseudo" name="pseudo" required />
                <input class="input" type="password" placeholder="Mot de passe" name="mot_de_passe" required />
                <input type="submit" name="submit" value="Connexion" class="nav_bouton_connect" />
                <div id="note"><span>Se souvenir <input class="checkbox"  type="checkbox" name="remember" /></span></div>
            </form>
            <div id="note"><a href="#">Mot de passe oublié ?</a></div>
        </div>
    </div>
</body>
</html>