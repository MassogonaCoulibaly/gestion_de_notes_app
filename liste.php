<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des eleves</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
    <script>
    $(document).ready(function() {
      let table = new DataTable('#myTable');
    });
  </script>
</head>
<body>

    <h1 class='h121'>Liste des eleves</h1>
    
    <?php
    // Connexion à la base de données
    include('connexion.php');
    // Requête SQL pour sélectionner les noms, prenoms, dates de naissance et mots de passe des utilisateurs
    $sql = "SELECT matricule, nom, prenom, date_naissance, genre, classe FROM eleve";

    // Exécution de la requête
    $stmt = $bdd->query($sql);

    // Traitement des résultats
    echo "<table class='table table-hover'>";
    echo "<tr class='bg-secondary text-white'>
    <th scope='col'>matricule</th>
    <th scope='col'>nom</th>
    <th scope='col'>prenom</th>
    <th scope='col'>date_naissance</th>
    <th scope='col'>genre</th>
    <th scope='col'>classe</th>
    <th scope='col'>Actions</th>
    </tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['matricule']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
        echo "<td>" . htmlspecialchars($row['date_naissance']) . "</td>";
        echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
        echo "<td>" . htmlspecialchars($row['classe']) . "</td>";
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
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
</body>
</html>