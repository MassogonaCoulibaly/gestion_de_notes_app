<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$date_naissance=$_POST['date_naissance'];
$genre=$_POST['genre'];
$classe=$_POST['classe'];

include('connexion.php');
$reponse=$bdd->query("INSERT INTO `eleve`( `nom`, `prenom`, `date_naissance`, `genre`, `classe`) VALUES ('$nom','$prenom','$date_naissance','$genre','$classe')");
$reponse->closeCursor();

echo('Enregistrement effectué avec succès!');
?>


<button class="btn" onclick="goBack()">Retour</button>

<button class="custom-button4" onclick="redirectToPage4()">Liste des etudiants</button>

<script>
    function goBack() {
        window.history.back();
    }

    function redirectToPage4() {
  window.location.href = "liste.php";
}
    </script>


</body>
</html>






