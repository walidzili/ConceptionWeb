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

    <div class="col col-lg-4">
        <form action="traitement_creer_bateau.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputName1">Nom du bateau:</label>
                <input type="text" class="form-control" id="nom" name="nom_bateau" placeholder="Saisissez le nom du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleInputType1">Type du bateau:</label>
                <input type="text" class="form-control" id="type" name="type_bateau" placeholder="Saisissez le type du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleInputLength1">Longueur du bateau:</label>
                <input type="number" step="0.01" class="form-control" id="longueur" name="longueur_bateau" placeholder="Saisissez la longueur du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleInputProvenance1">Provenance du bateau:</label>
                <input type="text" class="form-control" id="provenance" name="provenance_bateau" placeholder="Saisissez la provenance du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleInputAnnee1">Année de lancement du bateau:</label>
                <input type="date" class="form-control" id="annee" name="annee_bateau" placeholder="Saisissez l'année de lancement du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleInputDeplacement1">Déplacement du bateau:</label>
                <input type="number" class="form-control" id="deplacement" name="deplacement_bateau" placeholder="Saisissez le déplacement du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleInputVoilage1">Voilage du bateau:</label>
                <input type="number" class="form-control" id="voilage" name="voilage_bateau" placeholder="Saisissez le voilage du bateau" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Choisissez une image</label>
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Choisissez un pdf</label>
                <input type="file" name="fichier" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <button type="reset" class="btn btn-primary">Annuler</button>
        </form> 
    </div>
</div>
</div>