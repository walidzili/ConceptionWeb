<?php
require_once("inc/param.inc.php");
$mysqli = new mysqli($host, $login, $password, $dbname);
session_start(); 
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    $stmt = $mysqli->prepare("DELETE FROM bateau WHERE identifiant=?");
    if (!$stmt) {
         die ('Echec de la préparation : (' . $mysqli->errno . ') '. $mysqli->error);    
    }
    else{
        $stmt->bind_param('s', $identifiant);
        $identifiant=$_GET['id'];
        $result=$stmt->execute();
    }

    if(!$result){
        die("Echec de la requête SQL :".$mysqli->error);
    }
    else{
        echo "Le bateau a été supprimé";
        header('Location: page_respo.php');
    }
}
?>