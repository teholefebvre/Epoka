<?php
    require("connexion_bd.php");

    $req = "SELECT * FROM epoka_params WHERE id = 1";

    $resultat = $pdo -> query($req);

    $res = $resultat -> fetch();

    $km = $res['prixKM'];
    $indem = $res['prixHebergement'];
?>