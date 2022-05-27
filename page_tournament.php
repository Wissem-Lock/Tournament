<?php session_start(); ?>

<?php require 'db.php' ?>

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

<?php $query_games = $pdo->query("SELECT * FROM games");
$show_games = $query_games->fetchAll(PDO::FETCH_ASSOC);
?>


<section id="list-tournament">
    <div class="container-tournament">

        <?php

        foreach($show_games as $game):
            $id_game = htmlspecialchars($game['id']);
            $name_game = htmlspecialchars($game['name']);
            ?>
        <a href="tournament.php?game=<?=$game['name'] ?>&number=<?=$game['id'] ?>" <div class="card-tournament lol">

            <?php   endforeach;
            ?>

        </div></a>

    </div>
</section>


<?php include 'footer.php' ?>

</body>
</html>
