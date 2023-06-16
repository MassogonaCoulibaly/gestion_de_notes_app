<?php
require 'connexion.php';

$NOM = $_POST['nom'];
$PRENOM = $_POST['prenom'];
$DATE_NAISSANCE = $_POST['date_naissance'];
$GENRE = $_POST['genre'];
$CLASSE = $_POST['classe'];
$MATRICULE = $_POST['matricule'];

$req = "INSERT INTO eleve (nom, prenom, date_naissance, genre, classe, matricule) VALUES (:nom, :prenom, :date_naissance, :genre, :classe, :matricule)";
$stmt = $conn->prepare($req);
$stmt->bindParam(':nom', $NOM);
$stmt->bindParam(':prenom', $PRENOM);
$stmt->bindParam(':date_naissance', $DATE_NAISSANCE);
$stmt->bindParam(':genre', $GENRE);
$stmt->bindParam(':classe', $CLASSE);
$stmt->bindParam(':matricule', $MATRICULE);


if ($stmt->execute()) {
     echo "Enregistrement réussi!";
} else {
    echo "Erreur lors de l'enregistrement.";
}
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Confirmation</h1>
        <p>Le nouvel élève a été enregistré avec succès.</p>
        <div style="text-align:center">
            <a href="tableau.php" class="btn btn-primary">Afficher la liste</a>
            <a href="inscription.php" class="btn btn-secondary">Retour</a>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html> -->
