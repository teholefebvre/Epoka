<?php

    require("connexion_bd.php");

    if (!isset ($_GET ["du"])) die ("Date début absent");
    if ($_GET ["du"] == "") die ("Date début vide");
    $du = $_GET ['du'];
    if (!isset ($_GET ['au'])) die ("Date fin absent");
    if ($_GET ['au'] == "") die ("Date fin vide");
    $au = $_GET ['au'];
    if (!isset ($_GET ['noVille'])) die ("no ville absent");
    if ($_GET ['noVille'] == "") die ("no ville vide");
    $noVille = $_GET ['noVille'];
    if (!isset ($_GET ['idUtilisateur'])) die ("id utilisateur absent");
    if ($_GET ['idUtilisateur'] == "") die ("id utilisateur vide");
    $idUtilisateur = $_GET ['idUtilisateur'];

    
    $np = explode(" ", $idUtilisateur);
    $req = "SELECT id FROM epoka_users WHERE nom='$np[1]' AND prenom='$np[2]'";
    $resultat = $pdo -> query($req);
    $res = $resultat -> fetch();
    $idUtilisateur = $res['id'];

    $req = "INSERT INTO epoka_missions (dateDebut, dateFin, lieuMission, idUser) VALUES ('$du', '$au', '$noVille', '$idUtilisateur')";
    $pdo -> query($req);

    die("Enregistré");
?>