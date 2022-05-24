<?php session_start() ?>

<?php
if(!empty($_GET)) {
    if($_GET['dc'] == 0) {
        session_destroy();
        session_unset();
        header('location: ./index.php');
    }
} ?>