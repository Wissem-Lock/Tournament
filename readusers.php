<?php
$query_select = $pdo->query("SELECT * FROM users");
$show_users = $query_select->fetchAll(PDO::FETCH_ASSOC);
foreach ($show_users as $user):
$user_id = htmlspecialchars($user['id']);
$user_pseudo = htmlspecialchars($user['pseudo']);
$user_email = htmlspecialchars($user['email']);
$user_password = htmlspecialchars($user['password']);
endforeach;

?>