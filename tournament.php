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


<?php $query_games = $pdo->query("SELECT * FROM games");
$show_games = $query_games->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="detail-tournament">

    <div class="description-tournament">
       <h1><?= $_GET['game'] ?></h1>
        <p>Explication du jeux</p>

        <?php
        if(!empty($_SESSION['name'])) { ?>
        <button class="inscription">S'inscrire</button>
 <?php }
?>
    </div>

    <div class="session-tournament">
        <h1>Tournoi du xx/xx/xxxx</h1>

        <div class="arbre">
            <div class="left">
                <div class="input">
                    <p>Vide</p>
                    <p>Vide</p>
                </div>
                <div class="input">
                    <p>Vide</p>
                    <p>Vide</p>
                </div>
                <div class="input">
                    <p>Vide</p>
                    <p>Vide</p>
                </div>
            </div>

            <div class="right">
                <div class="input">
                    <p>Vide</p>
                    <p>Vide</p>
                </div>
                <div class="input">
                    <p>Vide</p>
                    <p>Vide</p>
                </div>
                <div class="input">
                    <p>Vide</p>
                    <p>Vide</p>
                </div>
            </div>
        </div>
    </div>


</section>

<?php include 'footer.php' ?>

</body>
</html>
