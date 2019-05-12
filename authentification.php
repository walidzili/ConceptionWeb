<?php  
    $titre='Authentification';
    require_once 'inc/header.inc.php';
    $valeur1='Inscription';
?>

<nav class="navbar navbar-dark bg-dark jusify-content-center">
    <div class="jusify-content-center">
    <a class="navbar-brand" href="#"><img src="images/ancre.png" height="50px"></a>
    </div>
</nav>

<?php
    if(!empty($_POST))
    {
        $errors = array();

        if(empty($_POST['nom'])||preg_match("/^[a-zA-Z]+s/" , $_POST['nom'])){
            $errors['nom']="Votre nom n'est pas valide";
        }
        if(empty($_POST['prenom'])||preg_match("/^[a-zA-Z]+s/" , $_POST['prenom'])){
            $errors['prenom']="Votre prenom n'est pas valide";
        }
        var_dump($errors);
    }
?>

<?php
    $variable_inscrip='';
    $variable_conn=' show active';
    $aria_inscrip='false';
    $aria_conn='true';

    if(isset($_GET['inscrip']))
    {
        if($_GET['inscrip']==1)
        {
            $variable_inscrip=' show active';
            $aria_inscrip='true';
            $variable_conn='';
            $aria_conn='false';
        }
    }
    else
    {
        if(isset($_GET['conn']))
        {
            if($_GET['conn']==1)
            {
                $variable_conn=' show active';
                $aria_conn='true';
                $variable_inscrip='';
                $aria_inscrip='false';
            }
        }
    }
?>

<br/>
<br/>
<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="col col-lg-4">
            <p><h3>Bienvenue sur le site de l'armada!!!</h3></p>
            <p><h3>Connectez ou inscrivez-vous</h3></p>
            <p><h3>pour avoir accès à des contenus</h3></p>
            <p><h3>plus détaillés.</h3></p>
        </div>

        <div class="col col-lg-4">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                <a class="nav-link<?php echo $variable_inscrip; ?>" id="pills-inscription-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="<?php echo $aria_inscrip; ?>">Inscription</a>
                </li>
                <li class="nav-item">
                <a class="nav-link<?php echo $variable_conn; ?>" id="pills-connexion-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="<?php echo $aria_conn; ?>">Connexion</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade<?php echo $variable_inscrip; ?>" id="pills-home" role="tabpanel" aria-labelledby="pills-inscription-tab">
                    <form action="traitement_inscrip.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputName1">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Saisissez votre nom" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputSurname1">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Saisissez votre prénom" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Adresse mail:</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Entrer votre email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mot de passe:</label>
                            <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Mot de passe" required>
                            <small id="emailHelp" class="form-text text-muted">Nous ne dévoilerons pas votre mot de passe.</small>
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                        <button type="reset" class="btn btn-primary">Annuler</button>
                    </form>
                    
                </div>
                <div class="tab-pane fade<?php echo $variable_conn; ?>" id="pills-profile" role="tabpanel" aria-labelledby="pills-connexion-tab">
                    <form action="traitement_conn.php" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Saisissez votre mail:</label>
                            <input type="email" class="form-control" id="email1" name="email_c" aria-describedby="emailHelp" placeholder="Entrer votre email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Saisissez votremot de passe:</label>
                            <input type="password" class="form-control" id="mdp1" name="mdp_c" placeholder="Mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary">Se connecter</button>
                        <button type="reset" class="btn btn-primary">Annuler</button>
                    </form>
                </div>
            </div>    
        </div>
    </div>
</div>
<br/>
<br/>

<?php require_once 'inc/footer.inc.php'; ?>