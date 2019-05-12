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
                $stmt = $mysqli->prepare("SELECT nom FROM bateau");
                if (!$stmt) {
                    echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
                }
                else{
                    
                    $result = $stmt->execute();
            
                    if(!$result){
                        die("Echec de la requête SQL :".$mysqli->error);
                    }
                    else{
                        $tp=$stmt->get_result();
                        echo '<div class="col col-lg-4">
                        <form action="traitement_modifier_bateau_admin.php" method="POST">
                            <p>nom du bateau</p>
                            <select name="boat" id="boat">
                                <option selected="selected">'.$_GET['param'].'</option>';
                                while($p=$tp->fetch_assoc()){
                                    if($p['nom']!=$_GET['param']){
                                        echo'<option value="'.$p['nom'].'">'.$p['nom'].'</option>';
                                    }
                                }
                            echo'</select>
                            <p><br></p>
                            <p>nom du responsable</p>
                            <select name="pers" id="pers">';
                                $stmt = $mysqli->prepare("SELECT nom FROM personnes WHERE statut=?");
                                if (!$stmt) {
                                    echo "Echec de la préparation : (" . $mysqli->errno . ") " . $mysqli->error;
                                }
                                else{
                                    $stmt->bind_param('s', $status);
                                    $status='Responsable';
                                    $rs = $stmt->execute();
                            
                                    if(!$rs){
                                        die("Echec de la requête SQL :".$mysqli->error);
                                    }
                                    else{
                                        $tple=$stmt->get_result();
                                        while($pers=$tple->fetch_assoc()){
                                            echo '<option value="'.$pers['nom'].'">'.$pers['nom'].'</option>';
                                        }
                                    }
                                }

                            echo'</select>
                            <p><br></p>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                            <button type="reset" class="btn btn-primary">Annuler</button>
                        </form>'; 
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