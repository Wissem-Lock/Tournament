<?php session_start(); ?>

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


<?php if(!empty($_SESSION['name'])) {
    ?> <h1>Bienvenue <?= $_SESSION['name']?></h1>
   <?php
} ?>

<section id="tournament">
    <div class="bloc-tournament">
        <h1>PROFESSIONAL ESPORT IN THE WORLD</h1>
    </div>
</section>

<section id="rules-tournament">
    <div class="bloc-rules">
        <div class="rules">
            <i class="fa-solid fa-fingerprint"></i>
            <p><span>Création de compte</span></p>
            <p>You can do it</p>
        </div>
        <div class="rules">
            <i class="fa-solid fa-gamepad"></i>
            <p><span>Choisi ton jeux</span></p>
            <p>You can do it</p>

        </div>
        <div class="rules">
            <i class="fa-solid fa-circle-check"></i>
            <p><span>Inscription au tournoi</span></p>
            <p>You can do it</p>

        </div>
        <div class="rules">
            <i class="fa-solid fa-burst"></i>
            <p><span>Participation au tournoi</span></p>
            <p>You can do it</p>

        </div>
    </div>
</section>


<section id="infos">
    <div class="infos">
        <div class="info-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias aliquam aliquid aspernatur at blanditiis cumque dolore dolores ducimus excepturi fuga id, impedit incidunt ipsam iste itaque iure libero maxime mollitia neque nesciunt odio pariatur quisquam quod recusandae repudiandae saepe tempora tempore? Accusantium amet architecto aspernatur, consequatur, cupiditate deserunt ea eligendi ex fugiat inventore magni mollitia non officia porro possimus quia quis repellendus saepe ullam voluptates? A accusamus atque beatae cupiditate, deserunt dolore dolorem et expedita facere fugiat fugit inventore ipsam iste iure, labore laudantium mollitia necessitatibus nemo non odio perferendis perspiciatis porro quae quaerat quibusdam reiciendis rem sapiente sint sit temporibus vel velit veritatis voluptatum? Accusamus, aliquam animi dignissimos distinctio doloribus, ducimus eligendi exercitationem facilis ipsa ipsum laboriosam, laudantium maxime odit officia officiis pariatur placeat quo sapiente sit soluta suscipit tempora ut vitae! Assumenda blanditiis eius laudantium maiores natus praesentium quam sint ut. Adipisci deserunt impedit nostrum quos tempora. Ut?</p>
        </div>
        <div class="info-photo">
            <iframe width="100%" height="350px" src="https://www.youtube.com/embed/jAOIwNOU_I4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <div class="double">
                <img src="assets/valorant.jpg">
                <img src="assets/rocketleague.jpg">
            </div>
        </div>
    </div>

</section>


<?php include 'footer.php' ?>


</body>
</html>
