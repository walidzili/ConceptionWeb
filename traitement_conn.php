<?php
require_once 'inc/param.inc.php';
$mysqli = new mysqli($host, $login, $password, $dbname);
if ($mysqli->connect_errno) {
    die ('Echec lors de la connexion à MySQL : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
else{
    $stmt = $mysqli->prepare("SELECT * FROM personnes WHERE (email=?)");
    if (!$stmt) {
         die ('Echec de la préparation : (' . $mysqli->errno . ') '. $mysqli->error);    
    }
    else{
        $stmt->bind_param('s', $email);
        $email=$_POST['email_c'];
        $result=$stmt->execute();
    }
}

if(!$result){
    die("Echec de la requête SQL :".$mysqli->error);
}
else
{
    $tp=($stmt->get_result());
    $tuple=$tp->fetch_assoc();
    if(password_verify($_POST['mdp_c'], $tuple['mdp'])){
        session_start(); 
        $_SESSION['id']=$tuple['id'];
        $_SESSION['nom']=$tuple['nom'];
        $_SESSION['prenom']=$tuple['prenom'];
        $_SESSION['email']=$tuple['email'];
        $_SESSION['statut']=$tuple['statut'];
        echo 'Connexion réussie';
        
        if($tuple['statut']=='Inscrit'){
            header('Location: page_inscrit.php');
        }
        elseif ($tuple['statut']=='Administrateur') {
            header('Location: page_admin.php');
        }
        else{
            header('Location: page_respo.php');
        }
    }
    else{
        echo 'Mot de passe ou email erronné';
        header('Location: authentification.php');
    }
}
?>