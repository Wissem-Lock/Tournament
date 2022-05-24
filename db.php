<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=Tournament', 'root', '');
 /*    foreach($pdo->query('SELECT * from users') as $row) {

    } */
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
