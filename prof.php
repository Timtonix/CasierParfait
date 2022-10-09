<?php
session_start();

if ($_SESSION['connect'] && $_SESSION['who'] == "prof"){
    # Base de donnée
    $mydatabase = fopen("./JSON/database.json", "r");
    $json_database = fread($mydatabase, filesize("./JSON/database.json"));
    $json_database_array = json_decode($json_database, true);
    fclose($mydatabase);

    ?>
    <html>
        <head>
            <body>
                <h1>Bienvenue dans l'espace professeur !</h1>
                <?php

                foreach ($json_database_array as $eleve){
                    ?>
                    <br><label for="audio" style="font-weight: bold; font-size: 20px">Poème selon <?php echo htmlspecialchars($eleve['nom']); ?> :</label><br>
                    <audio id="audio" controls>
                        <source src="./stockage/<?php echo htmlspecialchars($eleve['fichier']); ?>">
                    </audio>
                    <?php
                }

                ?>
                <audio src=""></audio>
            </body>
        </head>
    </html>
    <?php
} else{
    header("Location: ./index.php");
}
