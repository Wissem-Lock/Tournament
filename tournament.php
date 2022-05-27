<?php session_start(); ?>

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


<section id="detail-tournament">

    <div class="description-tournament">
       <h1><?= $_GET['game'] ?></h1>
        <p>Explication du jeux</p>

        <?php
        if(!empty($_SESSION['name'])) { ?>
                <form method="POST" action="inscription_tournament.php?game=<?= $_GET['game']?>&number=<?= $_GET['number'] ?>">
                    <input class="inscrire" type="submit" value="S'inscrire">
                </form>
       <?php }
?>
    </div>

    <div class="session-tournament">
        <h1>Tournoi du xx/xx/xxxx</h1>
        <div class="arbre">
 <?php

        $game_id = $_GET['number'];
        $game_name = $_GET['game'];


        // Récupère toutes les données dans la table inscription
        $query_inscription = $pdo->prepare("SELECT * from inscription WHERE id_games = :id");
        $query_inscription->bindParam('id',$game_id, PDO::PARAM_INT);
        $query_inscription->execute();
        $inscrits = $query_inscription->fetchAll(PDO::FETCH_ASSOC);

        // Pour chaque inscrit dans la table inscription , récupère leurs nom dans la table team
        foreach ($inscrits as $inscrit):

        $query_inscrits = $pdo->prepare("SELECT team.name FROM team WHERE id_team = :id_inscrit");
        $query_inscrits->bindParam('id_inscrit', $inscrit['id_team'], PDO::PARAM_INT);
        $query_inscrits->execute();
        $valide = $query_inscrits->fetchAll(PDO::FETCH_ASSOC);
        foreach ($valide as $valid): ?>

            <div class="branche">
                <?= $valid['name']; ?>
            </div>


        <?php endforeach;

endforeach;
?>
        </div>



</section>

<?php include 'footer.php' ?>

</body>
</html>
