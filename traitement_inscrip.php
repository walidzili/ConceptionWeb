<?php
require_once("inc/param.inc.php");
$mysqli = new mysqli($host, $login, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    $stmt = $mysqli->prepare("INSERT INTO personnes (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
         echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else{
        $stmt->bind_param("ssss", $nom, $prenom, $email, $mdp);
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
        $result = $stmt->execute();
        if(!$result){
            die("Echec de la requête SQL :".$mysqli->error);
        }
        else{
            session_start(); 
            $_SESSION['id']=$stmt->insert_id;
            $_SESSION['nom']=$nom;
            $_SESSION['prenom']=$prenom;
            $_SESSION['email']=$email;
            $_SESSION['statut']='inscrit';
            echo "Inscription réussie";
            header('Location: page_inscrit.php');
        }
    }
}    
?>