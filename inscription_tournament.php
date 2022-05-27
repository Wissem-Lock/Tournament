<?php
session_start();

include 'db.php';



// Selectionne l'équipe dans laquelle le joueur se trouve.
$query_chief = $pdo->prepare("SELECT  team.chief, team.id_team, users.team, team.name FROM users LEFT JOIN team ON users.team = team.id_team WHERE pseudo = :pseudo");
$query_chief->bindParam('pseudo', $_SESSION['name'], PDO::PARAM_STR);
$query_chief->execute();
$rows = $query_chief->fetchAll(PDO::FETCH_ASSOC);
foreach($rows as $row):
    $id_team = $row['id_team'];
endforeach;


// INSCRIT LEQUIPE AU TOURNOI SI l'utilisateur est chief
if($row['chief'] === $_SESSION['name']) {
    $query_insert_chief = $pdo->prepare("INSERT INTO inscription (id_games, id_team) VALUES (:games, :team) ");
    $query_insert_chief->bindParam('games', $_GET['number'], PDO::PARAM_INT);
    $query_insert_chief->bindParam('team', $id_team, PDO::PARAM_STR);
    $query_insert_chief->execute();
    header('location: ./tournament.php?game=' .$_GET['game']. "&number=" .$_GET['number']);
} else {
    echo("Vous n'êtes pas chef de votre équipe");
}
