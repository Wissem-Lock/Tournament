<?php session_start(); ?>

<?php
// Si l'utilisateur n'est pas connecté une page d'erreur s'affiche
    if(empty($_SESSION['name'])){
        header('location: ./error404.php');
        die();
    }
?>

<?php include 'db.php' ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_index.css">
    <title>Tournoi</title>

</head>
<body>


<?php include 'navbar.php' ?>

<?php

// Sélectionne les pseudo des joueurs et nom de team
$query_team = $pdo->prepare("SELECT users.pseudo, team.name FROM users LEFT JOIN team ON users.team = team.id_team WHERE pseudo = :pseudo");
$query_team->bindParam('pseudo', $_SESSION['name'], PDO::PARAM_STR);
$query_team->execute();
$rows = $query_team->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row):
$name = $row['name'];
endforeach;
?>

<section id="profil">

    <div class="bloc-card">
        <div class="card">
            <h1><?= $_SESSION['name'] ?> [<?= $name?>] </h1>
        </div>

        <a href="delete_team.php" class="delete_team">Delete equipe</a>
    </div>

    <div class="bloc-information">
        <div class="information">
            <h1>Profil</h1>

        </div>
    </div>

</section>




<?php include 'footer.php' ?>

</body>
</html>
