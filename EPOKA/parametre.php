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
            <li class="active nav-item"><a class="nav-link " href="parametre.php">Paramétrage</a></li>
        </ul>
    </nav>            
    <?php
        if(!empty($_SESSION) && $_SESSION['Rang'] == 1){
            require("php/get_parametre.php");
            require("php/get_option.php");
            require("php/get_tbl_distance.php");
            echo("
                <h1>Paramétrage de l'application</h1>
                <h2>Montant de remboursement au km</h2>
                <form method='POST' action='php/set_parametre.php'>
                    <div class='col-md-4'>
                        <label>Remboursement au Km</label>
                        <input type='text' class='form-control' value='$km' name='rembKM'>
                    </div>
                    <div class='col-md-4'>
                        <label>Indemnité d'hébergement</label>
                        <input type='text' class='form-control' value='$indem' name='indem'>
                    </div>
                    <div class='col-md-4 text-center'>
                        <br>
                        <input type='submit' value='Modifier' class='btn btn-primary'>
                    </div>
                </form>
                <hr>
                <h1>Distance entre villes</h1>
                <form method='POST' action='php/set_new_distance.php'>
                    <div class='col-md-12'>
                        <label>De : </label>
                        <select name='De'>
                            ".$option."
                        </select> 
                        <label> à : </label>
                        <select name='A'>
                            ".$option."
                        </select>
                    </div>
                    <div class='col-md-5'>
                        <label> Distance : </label>
                        <input type='text' class='form-control' name='distance'>
                        <br>
                        <div class='text-center'>
                            <input type='submit' class='btn btn-primary'>
                        </div>
                    </div>
                </form>
                <hr>
                <h1>Distance entre villes déjà saisies</h1>
                ".$tbl_distance."
            ");
            
        } else {
            echo("<h4 class='alert alert-danger' role='alert'>Vous n'êtes pas autorisé !</h4>");
        }         
        
    ?>
</body>

</html>