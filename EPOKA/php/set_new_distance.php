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
            <li class="nav-item"><a class="nav-link " href="#">Paiment des frais</a></li>
            <li class="active nav-item"><a class="nav-link " href="parametre.php">Paramétrage</a></li>
        </ul>
    </nav>     
    <?php
        // Connexion à la base
        require('connexion_bd.php');

        if (!isset($_POST['De'])) die ("Utilisateur absent !");
        if (!isset($_POST['A'])) die ("Mot de passe absent !");
        if (!isset($_POST['distance'])) die ("Utilisateur absent !");

        if ($_POST['De'] == "") die ("Départ vide");
        if ($_POST['A'] == "") die ("Arriver vide");
        if ($_POST['distance'] == "") die ("Distance vide");

        $depart = $_POST['De'];
        $arriver = $_POST['A'];
        $distance = $_POST['distance'];

        // On verifie que la distance n'est pas déjà enregistrer
        $req = "SELECT * FROM epoka_distances WHERE ville1='$depart' AND ville2='$arriver'";
        $resultat = $pdo -> query($req);
        $res = $resultat -> fetch();
        if ($res['id']) die ("<div class='alert alert-danger' role='alert'>Cette distance à déja étais enregistré</div>");

        $req = "INSERT INTO epoka_distances (ville1, ville2, distance) VALUES ('$depart', '$arriver', '$distance')";
        $pdo -> query($req);

        header('Location: http://localhost/Epoka/parametre.php');
        exit();
    ?>
</body>

</html>