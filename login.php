<?php session_start(); ?>

<?php require 'db.php'; ?>


<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['pseudo']) && isset($_POST['password'])) {
        /* Requete se connecter dans la bdd */
        $query_connect = $pdo->prepare("SELECT * FROM users WHERE pseudo = :pseudo");
        $query_connect->bindParam('pseudo', $_POST['pseudo'], PDO::PARAM_STR);
        $query_connect->execute();
        $rows = $query_connect->fetch(PDO::FETCH_ASSOC);
        if ($rows) {
            $password = $rows['password'];
            if (password_verify($_POST['password'], $password)) {
                $_SESSION['name'] = $_POST['pseudo'];
                header('Location: ./index.php');
                die();
            } else {
                echo 'Invalid password.';
            }

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
    <title>Connectez-vous</title>
</head>
<body>

<section id="login">
    <div class="bloc-login">
        <a href="index.php"><i class="fas fa-undo"></i></a>
        <h1>Connectez-vous</h1>
        <form action="" method="post">
            <input type="text" name="pseudo" placeholder="Entrez votre pseudo">
            <input type="password" name="password" placeholder="Entrez votre mot de passe">
            <input type="submit" name="submit" value="Se connecter">
            <a href="#">Mot de passe oublié?</a>
        </form>
        <div class="create">
            <a href="new_account.php">Créer un compte</a>
        </div>
    </div>

</section>



<script src="https://kit.fontawesome.com/0065732943.js" crossorigin="anonymous"></script>

</body>
</html>
