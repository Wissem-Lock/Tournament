<?php


// Connection à la base de donnée
try {
    $pdo = new PDO('mysql:host=localhost;dbname=[nomDeLaBdd]', '[nomDutilisateur]', '[motdepasse]');
 /*    foreach($pdo->query('SELECT * from users') as $row) {

    } */
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
