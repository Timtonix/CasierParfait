<?php
session_start();

if ($_SESSION['connect'] && $_SESSION['who'] == "prof"){
    # Base de donnée
    $mydatabase = fopen("./JSON/database.json", "r");
    $json_database = fread($mydatabase, filesize("./JSON/database.json"));
    $json_database_array = json_decode($json_database, true);
    fclose($mydatabase);
    var_dump($json_database_array);


    ?>
    <html>
        <head>
            <body>
                <h1>Bienvenue dans l'espace professeur !</h1>
                <?php
                echo $json_database_array["jacques_lol"]["fichier"];

                ?>
            </body>
        </head>
    </html>
    <?php
} else{
    header("Location: /CasierParfait/");
}
