<?php

    session_start();

    require("connexion_bd.php");

    if (!isset($_POST['util'])) die ("Utilisateur absent !");
    if (!isset($_POST['mdp'])) die ("Mot de passe absent !");

    $util = $_POST['util'];
    $mdp = $_POST['mdp'];

    if ($util == "") die ("Champ utilisateur vide !");
    if ($mdp == "") die ("Champ mdp vide !");

    $req = "SELECT * FROM epoka_users WHERE nom='$util' AND pass='$mdp'";

    $resultat = $pdo -> query($req);

    $res = $resultat -> fetch();

    if (empty($resultat)) die ("Utilisateur ou mot de passe incorect !");

    $_SESSION['Nom'] = $res['nom'];
    $_SESSION['Prenom'] = $res['prenom'];
    $_SESSION['Rang'] = $res['rang'];

    header('Location: http://localhost/Epoka/index.php');
    exit();
?>