<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>parent</title>
</head>
<body>



<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];
$classe = $_POST['classe'];
$matricule = $_POST['matricule'];

include('connexion.php');
$reponse=$bdd->query("INSERT INTO `parents`(`nom`, `prenom`, `email`, `mot_de_passe`, `classe`, `matricule`) VALUES ('$nom','$prenom','$email','$mot_de_passe','$classe','$matricule')");
$reponse->closeCursor();

echo('Enregistrement effectué avec succès!');
?>


<button class="btn" onclick="goBack()">Retour</button>

<button class="custom-button4" onclick="redirectToPage4()">Liste des parents</button>

<script>
    function goBack() {
        window.history.back();
    }

    function redirectToPage4() {
  window.location.href = "liste_parent.php";
}
    </script>


</body>
</html>






