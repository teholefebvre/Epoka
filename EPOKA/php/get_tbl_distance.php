<?php
    require("connexion_bd.php");

    $req = "SELECT * FROM epoka_distances";

    $resultat = $pdo -> query($req);
    $tbl_distance = "
        <div class='col-md-12'>
            <table class='table table-hover'>
                <thead class='thead-dark'>
                    <tr>
                    <th scope='col'>De</th>
                    <th scope='col'>A</th>
                    <th scope='col'>Distance</th>
                    </tr>
                </thead>
            <tbody>
    ";
    while($res = $resultat -> fetch()) {
        // Recupère le nom de la ville de départ
        $depart = $res['ville1'];
        $req1 = "SELECT Vil_Nom FROM ville WHERE id='$depart'";
        $resultat1 = $pdo -> query($req1);
        $res1 = $resultat1 -> fetch();
        $depart = $res1['Vil_Nom'];

        // Recupère le nom de la ville d'arriver
        $arriver = $res['ville2'];
        $req1 = "SELECT Vil_Nom FROM ville WHERE id='$arriver'";
        $resultat1 = $pdo -> query($req1);
        $res1 = $resultat1 -> fetch();
        $arriver = $res1['Vil_Nom'];

        $distance = $res['distance'];
        $tbl_distance = $tbl_distance."<tr><td>".$depart."</td><td>".$arriver."</td><td>".$distance."</td></tr>";
    }

    $tbl_distance = $tbl_distance."</tbody></table></div>";
    return $tbl_distance;
?>