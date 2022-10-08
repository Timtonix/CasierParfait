<?php
session_start();

if(isset($_POST['passphrase'])){
    if($_POST['passphrase'] == "eleve2nd4!"){
        $_SESSION['who'] = "student";
        $_SESSION['connect'] = true;
        header('Location: eleve.php');
    } elseif($_POST['passphrase'] == "profKern4!"){
        $_SESSION['who'] = "prof";
        $_SESSION['connect'] = true;
    }
}
?>

<html>
    <head>
        <body>
            <h1>Bienvenue sur CasierParfait !</h1>
            <form action="" method="post">
                <input type="text" name="passphrase" placeholder="Entrez le mot de passe">
                <input type="submit" name="send" value="Valider !">
            </form>
        </body>
    </head>
</html>
