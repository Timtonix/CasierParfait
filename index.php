<?php
session_start();
$erreur = "Bienvenue sur CasierParfait !";
if(isset($_POST['passphrase'])){
    if($_POST['passphrase'] == "eleve2nd4!"){
        $_SESSION['who'] = "student";
        $_SESSION['connect'] = true;
        header('Location: eleve.php');
    } elseif($_POST['passphrase'] == "profKern4!"){
        $_SESSION['who'] = "prof";
        $_SESSION['connect'] = true;
        header('Location: prof.php');
    } else{
        $erreur = "Veuillez rentrez un mot de passe valide";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Casier Parfait </title>
        <meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />  
        <link rel="stylesheet" href="css/pages/index.css">
    </head>
    <body>
        <section>
            <h1><?php echo $erreur; ?></h1>
                <form action="" method="post">
                    <input type="password" name="passphrase" placeholder="Entrez le mot de passe">
                    <input type="submit" name="send" value="Valider !">
                </form>
        </section>
    </body>
</html>


