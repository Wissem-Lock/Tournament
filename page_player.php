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

<?php

// Récupére les valeurs de pseudo dans la table users et de name dans la table team.
$query_select = $pdo->query("SELECT users.win, users.pseudo, team.name FROM users LEFT JOIN team ON users.team = team.id_team ORDER BY users.win DESC");
$show_users = $query_select->fetchAll(PDO::FETCH_ASSOC);




?>

<section id="page_player">

<table>
   <tr>
       <th>Pseudo</th>
       <th>Equipe</th>
       <th>Victoire</th>
   </tr>
   <tr>
       <?php foreach ($show_users as $user):
       $user_pseudo = ($user['pseudo']);
       $user_team = $user['name'];
       $user_win = $user['win']
       ?>
       <td><a href="player.php?player=<?= $user_pseudo ?>"> <?=$user_pseudo?></td></a>

       <td><a href="team.php?equipe=<?=$user_team?>"><?= $user_team ?></a></td>
       <td><?=$user_win ?></td>

   </tr>
   <?php endforeach; ?>

</table>

</section>



<?php include 'footer.php' ?>


</body>
</html>

