<?php
require_once("inc/param.inc.php");
$mysqli = new mysqli($host, $login, $password, $dbname);
session_start(); 

if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    $stmt = $mysqli->prepare("UPDATE personnes SET statut=? WHERE id=?");
    if (!$stmt||!$stmt1) {
         die ('Echec de la préparation : (' . $mysqli->errno . ') '. $mysqli->error);    
    }
    else{
        $stmt->bind_param('ss', $role, $id);
        $role=$_POST['role'];
        $id=$_GET['a'];
        $result=$stmt->execute();
    }

    if(!$result){
        die("Echec de la requête SQL :".$mysqli->error);
    }
    else{
        echo "Le statut a été modifié";
        header('Location: page_admin.php');
    }
}
?>