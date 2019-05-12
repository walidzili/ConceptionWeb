<?php
    $titre='Espace responsable';
    require_once 'inc/header.inc.php';
    if(!isset($_SESSION['statut'])){
        header('Location: index.php?error=1');
    }
    else{
        if($_SESSION['statut']!='Responsable'){
            header('Location: index.php?error=1');
        }
    }
    $statut='Responsable';
    $valeur1=$_SESSION['nom'];  
    require_once('inc/nav.inc.php');
?>
<br/>

<div class='container-fluid'>
    <?php
        require_once 'inc/param.inc.php';
        $mysqli = new mysqli($host, $login, $password, $dbname);
        if ($mysqli->connect_errno) {
            die ('Echec lors de la connexion à MySQL : (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
        }

        else {
            $stmt = $mysqli->prepare("SELECT * FROM bateau WHERE id_respo=?");
            if (!$stmt) {
                die ('Echec de la préparation : (' . $mysqli->errno . ') '. $mysqli->error);    
            }
            else{
                $stmt->bind_param('s', $_SESSION['id']);
                $result=$stmt->execute();
            }
        
            if(!$result){
                die('Echec de la requête SQL:'.$mysqli->error);
            }
            else{
                $tp=$stmt->get_result();
                echo '<strong>Liste des  bateaux</strong>';
                echo '<br>';
                while($p=$tp->fetch_assoc()){
                    echo '<div class='.'row'.'> 
                    <div class='."col col-lg-2 justify-content-center".'>
                        <div class='."col col-lg-4".'></div>
                        <div class='."col col-lg-4 justify-content-center".'>
                            <div class='.'row justify-content-center'.'>
                                <img src="'.$p['url'].'">
                            </div class="justify-content-center">
                            <br>
                            <div>
                                <a class="btn btn-primary" href="modifier_bateau.php?nom='.$p['nom'].'" role="button">Modifier</a>
                                <a class="btn btn-primary" href="suppression_bateau.php?id='.$p['identifiant'].'" role="button">Supprimer</a>
                            </div>
                        </div>
                        <div class='."col col-lg-4".'></div>
                    </div>
                    <div class='."col col-lg-2".'>
                        <div class="row">
                            <p><strong>Nom du bateau: </strong>'.$p['nom'].'</p>
                        </div>
                        <div class="row">
                            <p><strong>Type du bateau: </strong>'.$p['type_bateau'].'</p>
                        </div>
                        <div class="row">
                            <p><strong>Longueur du bateau: </strong>'.$p['longueur'].'</p>
                        </div>
                        <div class="row">
                            <p><strong>Provenance du bateau: </strong>'.$p['provenance'].'</p>
                        </div>
                        <div class="row">
                            <p><strong>Année de lancement du bateau: </strong>'.$p['annee_lancement'].'</p>
                        </div>
                        <div class="row">
                            <p><strong>Déplacement du bateau: </strong>'.$p['deplacement'].'</p>
                        </div>
                        <div class="row">
                            <p><strong>Voilage du bateau: </strong>'.$p['voilage'].'</p>
                        </div>
                    </div>
                    <div class='."col col-lg-6".'></div>
                </div>
            <br>';
                } 
            }
        }
    ?>
</div>