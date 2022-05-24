<?php

$query_insert = $pdo->prepare("INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)");
$query_insert->bindParam('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
$query_insert->bindParam('email', $_POST['email'], PDO::PARAM_STR);
$query_insert->bindParam('password', $_POST['password'], PDO::PARAM_STR);
if ($query_insert->execute()) {
    echo('requete effectué');
}

?>