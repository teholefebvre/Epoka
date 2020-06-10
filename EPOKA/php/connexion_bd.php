<?php
    $user = "root";
    $mdp = "";
    $host = "localhost";
    $dbname = "epoka";

    try {
        $pdo = new PDO('mysql:host='.$host.';dbname='.$dbname, $user, $mdp);
    } catch (Exception $e) {
        die ("Erreur : " .$e -> getMessage());
    }
?>