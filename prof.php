<?php
session_start();

if ($_SESSION['connect'] && $_SESSION['who'] == "prof"){
    ?>
    <html>
        <head>
            <body>
                <h1>Bienvenue dans l'espace professeur !</h1>
            </body>
        </head>
    </html>
    <?php
}
