<?php require 'db.php'; ?>


<?php
$query_select = $pdo->query("SELECT * FROM users");
$show_users = $query_select->fetchAll(PDO::FETCH_ASSOC);
foreach ($show_users as $user):
$user_id = ($user['id']);
$user_pseudo =($user['pseudo']);
$user_email = ($user['email']);
$user_password =($user['password']);
$user_date = ($user['date']);
endforeach;
?>



<?php

if (isset($_POST['create']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_verify'])) {
    if (($_POST['password_verify']) === ($_POST['password'])) {
        $password = $_POST['password'];
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);
        $query_insert = $pdo->prepare("INSERT INTO users (pseudo, email, password, date) VALUES (:pseudo, :email, :password, NOW())");
            $query_insert->bindParam('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
            $query_insert->bindParam('email', $_POST['email'], PDO::PARAM_STR);
            $query_insert->bindParam('password', $passwordhash, PDO::PARAM_STR);
            if ($query_insert->execute()) {
                echo('requete effectué');
            }
    } else {
        echo 'Les mots de passe ne correspondent pas';
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
    <title>Création de compte</title>
</head>
<body>

<section id="new-account">
    <div class="bloc-account">
        <h1>Créer votre compte</h1>
        <form action="" method="post">
            <input type="text" name="pseudo" placeholder="Entrer un pseudo">
            <input type="text" name="email" placeholder="Entrer votre email">
            <input type="password" name="password" placeholder="Entrer votre mot de passe">
            <input type="password" name="password_verify" placeholder="Confirmer votre mot de passe">
            <input type="submit" name="create" value="Création du compte">
        </form>
        <div class="create">
            <p>Vous possédez déjà un compte?</p><a href="login.php">Connectez-vous</a>
        </div>
    </div>
</section>


</body>
</html>
