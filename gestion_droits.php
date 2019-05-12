<?php
    $titre='Espace administrateur';
    require_once 'inc/header.inc.php';
    $statut='Administrateur';
    require_once 'inc/nav.inc.php';
?>
<br>

<div class='container-fluid'> 
    <div class="row justify-content-center">
        <div class="col col-lg-6">
            <form class="form-inline my-6 my-lg-0 justify-content-center" method="POST">
                <input class="form-control mr-sm-2" type="search" name="parameter" placeholder="Saisissez un nom" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
    
    <div class="justify-content-center">
        <div class="col col-lg-2"></div> 
        <div class="-col col-lg-8 accordion" id="accordionExample">
            <?php
                require_once("inc/param.inc.php");
                $mysqli1 = new mysqli($host, $login, $password, $dbname);
                if ($mysqli1->connect_errno) {
                    die ('Echec lors de la connexion à MySQL : (' . $mysqli1->connect_errno . ') ' . $mysqli1->connect_error);
                }

                else {
                    $stmt1 = $mysqli1->prepare("SELECT * FROM personnes");
                    if (!$stmt1) {
                        die ('Echec de la préparation : (' . $mysqli1->errno . ') '. $mysqli1->error);    
                    }
                    else{
                        $result=$stmt1->execute();
                    }
                }
        
                if(!$result){
                    die('Echec de la requête SQL:'.$mysqli1->error);
                }
                else{
                    $tp=$stmt1->get_result();
                    echo '<strong>Liste des personnes</strong>';
                    while($p=$tp->fetch_assoc()){
                        $a=$p['id'];
                        switch ($p['statut']) {
                            case 'Inscrit':
                                $role='Inscrit';
                                break;
                            case 'Responsable':
                                $role='Responsable';
                                break;
                            case 'Administrateur':
                                $role='Administrateur';
                                break;
                        }
                        echo '<div class="card">
                        <div class="card-header" id="heading'.$p['id'].'">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse'.$p['id'].'" aria-expanded="false" aria-controls="collapse'.$p['id'].'">
                            '.$p['nom'].' '.$p['prenom'].'
                            </button>
                        </h5>
                        </div>
                    
                        <div id="collapse'.$p['id'].'" class="collapse" aria-labelledby="heading'.$p['id'].'" data-parent="#accordionExample">
                            <div class="card-body">
                                <form method="POST" action="traitement_gestion_droits.php?a='.$a.'">
                                    <select name="role" id="role">';
                                        if($role=="Inscrit"){
                                            echo'<option selected="selected">'.$role.'</option>
                                            <option value="Administrateur">Administrateur</option>
                                            <option value="Responsable">Responsable</option>
                                            </select>';
                                        }
                                        if($role=="Administrateur"){
                                            echo'<option selected="selected">'.$role.'</option>
                                            <option value="Inscrit">Inscrit</option>
                                            <option value="Responsable">Responsable</option>
                                            </select>';
                                        }
                                        if($role=="Responsable"){
                                            echo'<option selected="selected">'.$role.'</option>
                                            <option value="Inscrit">Inscrit</option>
                                            <option value="Administrateur">Administrateur</option>
                                            </select>';
                                        }
                                    echo'<button type="submit" class="btn btn-primary">OK</button>
                                </form>
                            </div>
                        </div>
                    </div>';
                    }
                } 
            ?> 
        </div>
        <div class="col col-lg-2"></div>
    </div>
</div>
<br>
<?php
    require_once 'inc/footer.inc.php';
?>