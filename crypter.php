<?php
/*
$mydatabase = fopen("./JSON/database.json", "r");
echo fread($mydatabase, filesize("./JSON/database.json"));

$myjson = array("student" => array("nom" => "jean", "fichier" => "stockage/dkdk"));
$myjson = json_encode($myjson);

$myjson2 = array("student" => array("nom" => "pierre", "fichier" => "song/lol.mp3"));
$myjson2 = json_encode($myjson2);

$array = array_merge_recursive(json_decode($myjson, true), json_decode($myjson2, true));
$json = json_encode($array);
echo $myjson;
echo"<br>";
echo $json;


// Encode some data with a maximum depth  of 4 (array -> array -> array -> string)
$myjson1 = json_encode(
array(
    'English' => array(
        'One',
        'January'
    ),
    'French' => array(
        'Une',
        'Janvier'
    )
));

$myjson2 = json_encode(
    array(
        'Portugues' => array(
            'One',
            'January'
        ),
        'Allemand' => array(
            'Une',
            'Janvier'
        )
    ));



echo "<br>";
$array = array_merge_recursive(json_decode($myjson1, true), json_decode($myjson2, true));
$json = json_encode($array);
echo $json;
*/

echo realpath("stockage/")
?>
