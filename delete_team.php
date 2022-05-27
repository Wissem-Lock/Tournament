<?php

session_start();
include 'db.php';


// Supprime l'équipe à condition que l'utilisateur soit chef
$query_delete = $pdo->prepare("DELETE FROM team WHERE chief = :chief");
$query_delete->bindParam('chief', $_SESSION['name'], PDO::PARAM_STR );
if($query_delete->execute()){
    header("location: ./index.php");
    die();
}
?>