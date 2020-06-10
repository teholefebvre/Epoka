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
                    echo ("<li class='active nav-item'><a class='nav-link' href='php/deconnexion.php'>Déconnexion</a></li>");
                } else {
                    echo ("<li class='active nav-item'><a class='nav-link' href='index.php'>Connexion</a></li>");
                }
            ?>
            <li class="nav-item"><a class="nav-link " href="validation_mission.php">Validation des missions</a></li>
            <li class="nav-item"><a class="nav-link " href="paiment_des_frais.php">Paiement des frais</a></li>
            <li class="nav-item"><a class="nav-link " href="parametre.php">Paramétrage</a></li>
        </ul>
    </nav>
    <?php
        if(empty($_SESSION['Nom'])) {
            echo("
                <h1>Identifiez-vous</h1>
                <form method='POST' action='php/connexion.php'>
                    <div class='col-md-4'>
                        <label>Utilisateur</label>
                        <input type='text' class='form-control' name='util'>
                    </div>
                    <div class='col-md-4'>
                        <label>Mot de passe</label>
                        <input type='text' class='form-control' name='mdp'>
                    </div>
                    <div class='col-md-4 text-center'>
                        <br>
                        <input type='submit' value='Se connecter' class='btn btn-primary'>
                    </div>
                </form>
            ");
        } else {
            echo("<h4 class='alert alert-success' role='alert'>Vous êtes connecté !<h4>");
        }
    ?>
    
</body>

</html>