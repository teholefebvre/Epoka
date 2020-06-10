<?php

    require("connexion_bd.php");
   
    if (!isset ($_GET ["id"])) die ("Pseudo absent");
    $id = $_GET ['id'];
    if (!isset ($_GET ['mdp'])) die ("Mot de passe absent");
    $mdp = $_GET ['mdp'];
    

    $req = "SELECT * FROM epoka_users WHERE id='$id' AND pass='$mdp'";

    $resultat = $pdo -> query($req);
    if($res = $resultat -> fetch()) {
        echo($res['nom']." ".$res['prenom']);
    };
?>