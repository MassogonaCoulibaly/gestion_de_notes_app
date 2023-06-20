<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des parents</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/bootstrap-5.2.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
    <style>
        .btn{
            position: relative;
            top: -940px;
            left: 100px;
            border: 3px solid blue;
        }
        .h121{
            position: relative;
            top: 20px;
            left: 500px;
          
        }
    </style>
</head>
<body>

    <h1 class='h121'>Liste des parents</h1>
    
    <?php
    // Connexion à la base de données
    include('connexion.php');
    // Requête SQL pour sélectionner les noms, prenoms, dates de naissance et mots de passe des utilisateurs
    $sql = "SELECT id_parent, nom, prenom, email, classe, matricule FROM parents";

    // Exécution de la requête
    $stmt = $bdd->query($sql);

    // Traitement des résultats
    echo "<table class='table table-hover'>";
    echo "<tr class='bg-secondary text-white'>
    <th scope='col'>id_parent</th>
    <th scope='col'>nom</th>
    <th scope='col'>prenom</th>
    <th scope='col'>email</th>
    <th scope='col'>mot_de_passe</th>
    <th scope='col'>classe</th>
    <th scope='col'>matricule</th>
    <th scope='col'>Actions</th>
    </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id_parent']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['mot_de_passe']) . "</td>";
        echo "<td>" . htmlspecialchars($row['classe']) . "</td>";
        echo "<td>" . htmlspecialchars($row['matricule']) . "</td>";
        echo "<td><a href='modifier.php'><button>Modifier</button></a></td>";
        echo "<td><a href='supprimer.php'><button>Supprimer</button></a></td>";


        echo "</tr>";
    }
    echo "</table>";
?>
<button class="btn" onclick="goBack()">Retour</button>

<script>
    function goBack() {
        window.history.back();
    }
    </script>
   
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>