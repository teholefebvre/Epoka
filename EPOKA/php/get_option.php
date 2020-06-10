<?php
    // Connexion à la base
    require('connexion_bd.php');
    
    $req = "SELECT Vil_Nom,id FROM ville";
    $resultat = $pdo -> query($req);
    $option = "";

    while ($res = $resultat -> fetch()) {
        $option = $option."<option value='".$res['id']."'>".$res['Vil_Nom']."<option>";
    }
?>