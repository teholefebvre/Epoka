<?php

    require("connexion_bd.php");

    if (!isset($_POST['rembKM']) || !isset($_POST['indem'])) die ("Valeur abscente !");

    $km = $_POST['rembKM'];
    $indem = $_POST['indem'];

    if ($km == "" || $indem == "") die ("Les champs ne sont pas remplis !");

    $req = "UPDATE epoka_params SET prixKM='$km', prixHebergement='$indem' WHERE id=1";

    $pdo -> query($req);

    header("Location: http://localhost/EPOKA/parametre.php");
    exit();
?>