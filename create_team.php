<?php session_start(); ?>

<?php

// Redirige vers l'accueil si l'utilisateur n'est pas connecté
if(empty($_SESSION['name'])){
header('location: ./error404.php');
die();
}

?>

<?php require 'db.php'; ?>

<?php

// Selectionne toute les équipes
$query_select = $pdo->query("SELECT name FROM team");
$show_team = $query_select->fetchAll(PDO::FETCH_ASSOC);
foreach ($show_team as $team):
    $name = $team['name'];
endforeach;

// Créer une équipe si le nom n'est pas déjà utilisé et l'affiche sur la page page_team
if (isset($_POST['create_team'])){
    if($_POST['name'] === $name) {
            echo('Ce nom est déjà utilisé');
        } else {

            $query_insert = $pdo->prepare("INSERT INTO team (name, chief, nb_player) VALUES (:name, :chief, :number)");
            $query_insert->bindParam('name', $_POST['name'], PDO::PARAM_STR);
            $query_insert->bindParam('chief', $_SESSION['name'], PDO::PARAM_STR);
            $query_insert->bindValue('number', 1, PDO::PARAM_INT);
            if ($query_insert->execute()) {

                echo('requete effectué');
                $query_select = $pdo->query("SELECT * FROM team");
                $show_team = $query_select->fetchAll(PDO::FETCH_ASSOC);
                foreach ($show_team as $team):
                    $name = $team['name'];
                endforeach;


                $insert_team = $pdo->prepare("UPDATE users SET team = :team WHERE pseudo = :pseudo");
                $insert_team->bindParam('team', $team['id_team'], PDO::PARAM_INT);
                $insert_team->bindParam('pseudo', $_SESSION['name'], PDO::PARAM_STR);
                $insert_team->execute();

                header('location: ./team.php?equipe='.$name);
            }
        }
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style_index.css">
    <title>Création d'équipe</title>
</head>
<body>

<section id="new-account">
    <div class="bloc-account">
        <a href="index.php"><i class="fas fa-undo"></i></a>
        <h1>Créer votre équipe</h1>
        <form action="" method="post">
            <input type="text" name="name" placeholder="Nom de l'équipe">
            <input type="submit" name="create_team" value="Création de l'équipe">
        </form>
    </div>
</section>


<script src="https://kit.fontawesome.com/0065732943.js" crossorigin="anonymous"></script>
</body>
</html>
