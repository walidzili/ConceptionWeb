<?php
require_once("inc/param.inc.php");
$mysqli = new mysqli($host, $login, $password, $dbname);
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else{
    $stmt = $mysqli->prepare("UPDATE bateau SET id_respo=? WHERE nom=?");
    if (!$stmt) {
         echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
    }
    else{
        $stmt->bind_param('is', $id, $nom);
        
            $mysqli1 = new mysqli($host, $login, $password, $dbname);
            if ($mysqli1->connect_errno) {
                echo "Echec lors de la connexion à MySQL : (" . $mysqli1->connect_errno . ") " . $mysqli1->connect_error;
            }
            else {
                $stmt1= $mysqli1->prepare("SELECT id FROM personnes WHERE nom=?");
                if (!$stmt1) {
                    echo "Echec de la préparation : (" . $mysqli1->errno . ") " . $mysqli1->error;
                }
                else {
                    $stmt1->bind_param('s', $_POST['pers']);
                    $result1=$stmt1->execute();

                    if(!$result1){
                        die("Echec de la requête SQL :".$mysqli1->error);
                    }
                    else {
                        $tp=$stmt1->get_result();
                        $id=$tp->fetch_assoc();
                        var_dump($_POST);
                        $nom=$_POST['boat'];
                        var_dump($id);
                        $result=$stmt->execute();
                        
                        if(!$result){
                            die("Echec de la requête SQL :".$mysqli->error);
                        }
                        else{
                            session_start(); 
                            echo 'Opération effectuée';
                            //header('Location: page_respo.php');
                        }
                    }
                }
            }

        
    }
}    



    /*$mysqli1 = new mysqli($host, $login, $password, $dbname);
    if ($mysqli1->connect_errno) {
        echo "Echec lors de la connexion à MySQL : (" . $mysqli1->connect_errno . ") " . $mysqli1->connect_error;
    }
    else {
        $stmt1= $mysqli1->prepare("SELECT id FROM personnes WHERE nom=?");
        if (!$stmt1) {
            echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
        }
        else {
            $stmt1->bind_param('i', $_POST['pers']);
            $result1=$stmt1->execute();

            if(!$result1){
                die("Echec de la requête SQL :".$mysqli->error);
            }
            else {
                $tp=$stmt1->get_result();
                $id=$tp->fetch_assoc();
                var_dump($_POST);

                $mysqli = new mysqli($host, $login, $password, $dbname);
                if ($mysqli->connect_errno) {
                    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                }
                else{
                    $stmt = $mysqli->prepare("UPDATE bateau SET id_respo=? WHERE nom=?");
                    if (!$stmt) {
                        echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
                    }
                    else{
                        $stmt->bind_param('ss', $nom, $id);

                $nom=$_POST['boat'];
                var_dump($stmt);
                $result=$stmt->execute();
                
                if(!$result){
                    die("Echec de la requête SQL :".$mysqli->error);
                }
                else{
                    session_start(); 
                    echo 'Opération effectuée';
                    //header('Location: page_respo.php');
                }
            }
        }
    }*/

            ?>