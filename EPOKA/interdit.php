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
            <li class="nav-item"><a class="nav-link " href="paiment_des_frais.php">Paiement des frais</a></li>
            <li class="nav-item"><a class="nav-link " href="parametre.php">Paramétrage</a></li>
        </ul>
    </nav>
    <h4 class="alert alert-danger" role="alert">Vous n'êtes pas autorisé</h4>
</body>

</html>