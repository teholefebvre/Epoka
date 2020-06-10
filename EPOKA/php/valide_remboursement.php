<?php
    require("connexion_bd.php");

    if (!isset($_POST['id'])) die ("Id absent !");
    $id = $_POST['id'];

    $req = "UPDATE epoka_missions SET rembourse='1' WHERE idMission='$id'";

    $pdo -> query($req);

    header('Location: http://localhost/EPOKA/paiment_des_frais.php');
    exit();
?>