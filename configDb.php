<?php
$servername = "localhost";
$username = "root";
$password = "";
//Pour créer la connexion
$connDb = mysqli_connect($servername, $username, $password); //Verifier la connexion
if ($connDb) {
    echo "connected successfully <br>";
        $dbCheck = mysqli_select_db($connDb, "locationVoiture");
        if ($dbCheck) {
            echo 'connected';
        }else{
            echo 'failed';
        }
    }else{
        die("connexion failed " .mysqli_connect_error());//Une fonction qui affiche un message et termine l'exécution du script actuel.

    }
    
?>