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


<?php $query_team = $pdo->query("SELECT * FROM team");
$show_team = $query_team->fetchAll(PDO::FETCH_ASSOC);
?>

<section id="profil">

    <div class="bloc-card">
        <div class="card">
            <h1><?= $_GET['equipe'] ?></h1>

        </div>
    </div>

    <div class="bloc-information">
        <div class="information">
            <h1>Stats</h1>

        </div>
    </div>

</section>




<?php include 'footer.php' ?>

</body>
</html>
