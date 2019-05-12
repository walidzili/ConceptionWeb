<?php
    $titre='Espace administrateur';
    require_once 'inc/header.inc.php';
    $statut='Responsable';
    require_once 'inc/nav.inc.php';
?>
<br>

<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col col-lg-4">
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
            <p>Lorem Ipsum Dolor</p>
        </div>

        <?php
            require_once("inc/param.inc.php");
            $mysqli = new mysqli($host, $login, $password, $dbname);
            if ($mysqli->connect_errno) {
                echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            }
            else{
                $stmt = $mysqli->prepare("SELECT * FROM bateau WHERE nom=?");
                if (!$stmt) {
                    echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
                }
                else{
                    $stmt->bind_param('s', $_GET['nom']);
                    
                    $result = $stmt->execute();
            
                    if(!$result){
                        die("Echec de la requête SQL :".$mysqli->error);
                    }
                    else{
                        $tp=$stmt->get_result();
                        $r=$tp->fetch_assoc();
                        echo '<div class="col col-lg-4">
                        <form action="traitement_modifier_bateau.php?id='.$r['identifiant'].'" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleInputName1">Nom du bateau:</label>
                                <input type="text" class="form-control" id="nom" name="nom_bateau" value="'.$r['nom'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputType1">Type du bateau:</label>
                                <input type="text" class="form-control" id="type" name="type_bateau" value="'.$r['type_bateau'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLength1">Longueur du bateau:</label>
                                <input type="number" step="0.01" class="form-control" id="longueur" name="longueur_bateau" value="'.$r['longueur'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputProvenance1">Provenance du bateau:</label>
                                <input type="text" class="form-control" id="provenance" name="provenance_bateau" value="'.$r['provenance'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAnnee1">Année de lancement du bateau:</label>
                                <input type="date" class="form-control" id="annee" name="annee_bateau" value="'.$r['annee_lancement'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputDeplacement1">Déplacement du bateau:</label>
                                <input type="number" class="form-control" id="deplacement" name="deplacement_bateau" value="'.$r['deplacement'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputVoilage1">Voilage du bateau:</label>
                                <input type="number" class="form-control" id="voilage" name="voilage_bateau" value="'.$r['voilage'].'" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Choisissez une image</label>
                                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-primary">Annuler</button>
                        </form> 
                    </div>';
                    }
                }
            }  
        ?>   
    </div>
</div>

<br>

<?php
    require_once 'inc/footer.inc.php';
?>