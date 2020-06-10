<?php
    require("connexion_bd.php");

    $req = "SELECT * FROM epoka_missions";

    $resultat = $pdo -> query($req);

    function get_nom_prenom($id) {
        require("connexion_bd.php");
        $req = "SELECT nom, prenom FROM epoka_users WHERE id='$id'";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        $nom = $res['nom'];
        $prenom = $res['prenom'];
        $tbl = array(
            "nom" => $nom,
            "prenom" => $prenom
        );
        return $tbl;
    }

    function get_lieu_mission($id) {
        require("connexion_bd.php");
        $req = "SELECT Vil_CP, Vil_Nom FROM ville WHERE id='$id'";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        $nom_ville = $res['Vil_Nom'];
        $cp_ville = $res['Vil_CP'];
        $lieu = array (
            "nom_ville" => $nom_ville,
            "cp_ville" => $cp_ville
        );
        return $lieu;
    }

    function calcul_montant(int $id, int $idlieu){
        require("connexion_bd.php");
        $req = "SELECT agence FROM epoka_users WHERE id='$id'";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        $id_agence = $res['agence'];

        $req = "SELECT lieuAgence FROM epoka_agences WHERE idAgence='$id_agence'";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        $lieu_agence = $res['lieuAgence'];

        $req = "SELECT distance FROM epoka_distances WHERE ville1='$lieu_agence' AND ville2='$idlieu'";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        $distance = $res['distance'];

        $req = "SELECT * FROM epoka_params";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        $prixHebergement = $res['prixHebergement'];
        $prixKM = $res['prixKM'];

        // Si la distance n'est pas renseigné
        if(empty($distance)){
            // Recupère le nom de la ville de départ
            $req = "SELECT Vil_Nom FROM ville WHERE id='$lieu_agence'";
            $resultat = $pdo -> query($req);
            $res = $resultat -> fetch();
            $depart = $res['Vil_Nom'];

            // Recupère le nom de la ville d'arriver
            $req = "SELECT Vil_Nom FROM ville WHERE id='$idlieu'";
            $resultat = $pdo -> query($req);
            $res = $resultat -> fetch();
            $arriver = $res['Vil_Nom'];

            return ("Distance entre ".$depart." et ".$arriver." non définie");
        } else {
            $montant = $prixKM * $distance + $prixHebergement." €";
            return $montant;
        }
        
    }
?>