<?php
require_once("inc/param.inc.php");
$mysqli = new mysqli($host, $login, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    $stmt = $mysqli->prepare("UPDATE bateau SET nom=?, type_bateau=?, longueur=?, provenance=?, annee_lancement=?, deplacement=?, voilage=?, url=? WHERE identifiant=?");
    if (!$stmt) {
         echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else{
        $stmt->bind_param('sssssssss', $nom, $type_bateau, $longueur, $provenance, $annee_lancement, $deplacement, $voilage, $url, $id);
        $id=$_GET['id'];
        $nom = $_POST['nom_bateau'];
        $type_bateau = $_POST['type_bateau'];
        $longueur = $_POST['longueur_bateau'];
        $provenance = $_POST['provenance_bateau'];
        $annee_lancement = $_POST['annee_bateau'];
        $deplacement = $_POST['deplacement_bateau'];
        $voilage = $_POST['voilage_bateau'];
        //UPLOAD DE L'IMAGE DU BATEAU
        $image = $_FILES['image'];
        $url = 'images/'.$image['name'];
        move_uploaded_file($image['tmp_name'], $url);

        $result = $stmt->execute();
        
        if(!$result){
            die("Echec de la requête SQL :".$mysqli->error);
        }
        else{
            session_start(); 
            echo 'Opération effectuée';
            header('Location: page_respo.php');
        }
    }
}    
?>