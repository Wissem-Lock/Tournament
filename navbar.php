<header>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="page_team.php">Equipes</a></li>
            <li><a href="page_player.php">Joueurs</a></li>
            <li><a href="page_tournament.php">Tournois</a></li>
            <?php  if(!empty($_SESSION['name'])) {
                ?> <li><a href="page_profil.php">Profil</a></li> <?php
            } else { ?>

            <?php    } ?>


            <?php  if(!empty($_SESSION['name'])) {
                ?> <li><a href="logout.php?dc=0">Deconnexion</a></li> <?php
            } else { ?>
                <li><a href="login.php">Login</a ></li >
         <?php    } ?>

        </ul>
    </nav>
</header>
