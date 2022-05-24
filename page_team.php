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

<?php $query_select = $pdo->query("SELECT * FROM team");
$show_team = $query_select->fetchAll(PDO::FETCH_ASSOC);

?>

<section id="page_team">

    <?php

    if(!empty($_SESSION['name'])) { ?>

        <a href = "create_team.php" ><button class="create_team" > Créer une équipe </button ></a >

 <?php    }
?>
    <table>
    <tr>
        <th>Equipe</th>
        <th>Chef d'équipe</th>
        <th>Nombre de joueurs</th>
        <th>Nombre de victoires</th>
    </tr>
    <tr>
        <?php foreach ($show_team as $team):
        $team_id = ($team['id_team']);
        $team_chief = $team['chief'];
        $team_name = ($team['name']);
        $team_nb = ($team['nb_player']);
        $team_win = ($team['win']);
        ?>
        <td><a href="team.php?equipe=<?=$team_name?>"> <?= $team_name ?></td></a>
        <td><?= $team_chief ?></td>
        <td><?= $team_nb ?></td>
        <td><?= $team_win ?></td>

    </tr>
    <?php endforeach; ?>

</table>


</section>


<?php include 'footer.php' ?>


</body>
</html>