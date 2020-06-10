<!doctype html>
<html lang="fr">

<head>
    <?php
        session_start();
    ?>
    <meta charset="utf-8">
    <title>EPOKA</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <ul class="navbar-nav">
            <?php
                if (!empty($_SESSION['Nom'])) {
                    echo ("<li class='nav-item'><a class='nav-link' href='php/deconnexion.php'>Déconnexion</a></li>");
                } else {
                    echo ("<li class='nav-item'><a class='nav-link' href='index.php'>Connexion</a></li>");
                }
            ?>
            <li class="nav-item"><a class="nav-link " href="validation_mission.php">Validation des missions</a></li>
            <li class="active nav-item"><a class="nav-link " href="paiment_des_frais.php">Paiement des frais</a></li>
            <li class="nav-item"><a class="nav-link " href="parametre.php">Paramétrage</a></li>
        </ul>
    </nav>
    <?php
        if (!empty($_SESSION)) {
            if ($_SESSION['Rang'] == 1) {
                echo("<h1>Validation des missions de vos subordonnés</h1>");
                require("php/get_tableau_mission.php");
                echo("
                    <div class='col-md-12'>
                        <table class='table table-hover'>
                            <thead class='thead-dark'>
                                <tr>
                                <th scope='col'>Nom du salarié</th>
                                <th scope='col'>Prénom du salarié</th>
                                <th scope='col'>Début de la mission</th>
                                <th scope='col'>Fin de la mission</th>
                                <th scope='col'>Lieu de la mission</th>
                                <th scope='col'>Montant</th>
                                <th scope='col'>Paiment</th>
                                </tr>
                            </thead>
                            <tbody>
                ");
                
                while ($res = $resultat -> fetch()) {
                    if ($res['valide'] == 1) {
                        $tbl = get_nom_prenom($res['idUser']);
                        $lieu = get_lieu_mission($res['lieuMission']);
                        $montant = calcul_montant($res['idUser'], $res['lieuMission']);
                        $test = strpos($montant, "Distance");
                        echo("
                                <tr>
                                    <td>".$tbl['nom']."</td>
                                    <td>".$tbl['prenom']."</td>
                                    <td>".$res['dateDebut']."</td>
                                    <td>".$res['dateFin']."</td>
                                    <td>".$lieu['nom_ville']."(".$lieu['cp_ville'].")</td>
                                    <td>".$montant."</td>
                        ");
                        if ($res['rembourse'] == 0) {
                            if ($test > -1) {
                                $valide = "<input type='button' class='btn btn-secondary' value='Rembourser'/>";
                                echo("  
                                    <td>".$valide."</td>
                                    </tr>
                                ");
                            } else {
                                $valide = "<form method='POST' action='php/valide_remboursement.php'><input type='hidden' name='id' value='".$res['idMission']."'><button class='btn btn-primary' type='submit'>Rembourser</button></form>";
                                echo("  
                                    <td>".$valide."</td>
                                    </tr>
                                ");
                            }
                        } else {
                            echo("<td>Remboursée</td>");
                        }
                    }
                }
                echo("
                            </tbody>
                        </table>
                    </div>
                ");
            } else {
                echo("<h4 class='alert alert-danger' role'alert'>Vous n'êtes pas autorisé !</h4>");
            }
        } else {
            echo("<h4 class='alert alert-danger' role'alert'>Vous n'êtes pas autorisé !</h4>");
        }
    ?>
</body>

</html>