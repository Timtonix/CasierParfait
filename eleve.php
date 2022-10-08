<?php
session_start();

# Vérification de la connexion
if ($_SESSION['connect']){
    if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_FILES['song']) && isset($_POST['classe'])){
        # Variable
        $nom = strtolower($_POST['nom']);
        $prenom = strtolower($_POST['prenom']);
        $classe = $_POST['classe'];
        $nomprenom = $nom . "_" . $prenom;
        $message = $_POST['message'];

        # Base de donnée
        $mydatabase = fopen("./JSON/database.json", "r");
        $json_database = fread($mydatabase, filesize("./JSON/database.json"));
        $json_database_array = json_decode($json_database, true);
        fclose($mydatabase);


        # Fichier
        $target_dir = "stockage/";
        $temp_file_name = explode(".", $_FILES["song"]["name"]);
        $good_file_name = $nomprenom . "." . end($temp_file_name);
        $target_file = $target_dir . $good_file_name;
        $uploadOk = 1;
        $songfiletype = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        # Préparation du tableau de donnée JSON
        $eleve_array = array(
                $nomprenom => array(
                    "nom" => $nom . " " . $prenom,
                    "classe" => $classe,
                    "fichier" => $good_file_name,
                    "message" => $message
                )
        );
        $all_array = array_merge_recursive($json_database_array, $eleve_array);
        $all_json = json_encode($all_array);


        if($songfiletype != "mp3" && $songfiletype != "mp4" && $songfiletype != "aac" && $songfiletype != "wav" && $songfiletype != "m4a" && $songfiletype != "flac" && $songfiletype != "oga") {
            echo "Désolé mais le format de fichier n'est pas accepté !";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Désolé mais le fichier n'a pas été envoyé ". $good_file_name;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["song"]["tmp_name"], $target_file)) {
                file_put_contents("./JSON/database.json", $all_json);
                echo "The file ". htmlspecialchars($target_file). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    } else{
        echo "Veuillez remplir le formulaire";
    }
    ?>
    <html>
        <head>
            <body>
                <h1>Bienvenue élève !</h1>
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="nom">Entrez votre nom : </label><input type="text" name="nom" id="nom" required><br>
                    <label for="prenom">Entrez votre prénom : </label><input type="text" name="prenom" id="prenom" required><br><br>
                    <label for="classe">Votre classe:</label>
                    <select name="classe" id="classe" required>
                        <option value="4">Seconde 4</option>
                    </select><br><br>
                    <input type="file" name="song" required><br>
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Entrez votre message"></textarea><br>
                    <input type="submit" name="send" value="Envoyer">
                </form>
            </body>
        </head>
    </html>
    <?php
} else{
    header('Location: /CasierParfait');
}

?>