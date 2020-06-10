<?php

    require("connexion_bd.php");

    $req = "SELECT Vil_Nom, Vil_CP FROM ville";
    $resultat = $pdo -> query($req);
    
    while($res = $resultat -> fetch()) {
        echo($res['Vil_Nom']."(".$res['Vil_CP'].")@");
    }
?>