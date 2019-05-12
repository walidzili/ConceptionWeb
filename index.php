<?php  
    $titre='Accueil';
    require_once 'inc/header.inc.php';
    if(!isset($_SESSION['statut'])){
        $statut='Visiteur';
    }
    else{
        $statut=$_SESSION['statut'];
    }
    require_once 'inc/nav.inc.php';
?>

<div class='container-fluid'>

<?php
    if(isset($_GET['error'])){
        if($_GET['error']==1){
            echo '<br>
            <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="alert alert-danger" role="alert">
                Vous n\'avez pas les droits d\'accès!
                </div>
            </div>
            </div>
            <br>';
        }
    }
?>
    <div class="row justify-content-center">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/bateau0.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/bateau1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/bateau4.jpg" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
            </a>
        </div>
    </div>  
    <br>
    <div>
        <div class="row justify-content-center">
            <div class="col col-lg-2"></div>
            <div class="col col-lg-8">
                <p class="text-justify">
                    <strong><h4>Le mot du Président</h4></strong>
                    En 2019, l&rsquo;association de L&rsquo;Armada de la libert&eacute; f&ecirc;tera ses 30 ans d&rsquo;existence et sa 7e &eacute;dition, qui aura lieu du <strong>6 au 16 juin 2019</strong>.<br />
                    Des millions de visiteurs sont de nouveau attendus sur les quais du port de Rouen. Ils profiteront de concerts, de feux d&rsquo;artifices g&eacute;ants et de nombreuses animations et bien s&ucirc;r visiteront gratuitement la cinquantaine de navires pr&eacute;sents.&nbsp;<strong>Les plus beaux et les plus grands voiliers</strong>, les b&acirc;timents <span class="st">militaires </span>les plus modernes et d&rsquo;autres bateaux d&rsquo;exception venus du monde entier auront remont&eacute; la Seine sur 120 kilom&egrave;tres &agrave; travers les magnifiques paysages de la Normandie.<br />
                    Du Havre jusqu&rsquo;&agrave; Paris, l&rsquo;Armada est devenue&nbsp;<strong>l&rsquo;&eacute;v&eacute;nement f&eacute;d&eacute;rateur de l&rsquo;axe Seine</strong>.
                </p>
            </div>
            <div class="col col-lg-2"></div>
        </div>
    </div>
    <br> 
    <div id="programme">
        <div class="row">
            <div class="col col-lg-2"></div>
            <div class="col col-lg-8">
                <p class="text-justify">
                    <strong><h3>Programme</h3></strong>
                </p>
                <p>
                    <u><strong>5 Juin:</strong></u> En ouverture et en avant-première de l’Armada, la Seine s’anime … C’est la Grande pagaille. Les équipes doivent construire leur embarcation  et tentent de traverser la Seine sans couler à bord de leur OFNI : Objet Flottant Non Identifié.
                    Assistez au lancement de la 7e édition de l’Armada en découvrant cette folle traversée riche en émotion, où les équipages rivalisent d’imagination et d’originalité.
                    En clôture de cette journée, ne manquez pas la levée du Pont Flaubert, le soir entre 21h et minuit.
                </p>
                <p>   
                    <u><strong>6 Juin:</strong></u>De nouveau le Pont Flaubert se lève entre 5h et 6h du matin. Les voilà !
                    C’est l’arrivée des navires ! Assistez à cette remontée de la Seine des plus beaux voiliers du monde. Saluez les marins venus de tous les horizons qui débarquent à Rouen, sur les quais, dans la ville.
                    Pour les plus tardifs, la levée du pont Flaubert est également prévue le soir entre 21h et minuit.
                    Tir d’un feu d’artifice vers 22h30
                </p>
                <p>   
                    <u><strong>7 Juin:</strong></u>Soyez matinaux ! Le Pont Flaubert se lève entre 5h et 6h, une occasion de se promener sur les quais au petit matin ou alors il faut veiller tard car il se lève à nouveau entre 21h et minuit. Cette journée accueille le congrès du Mérite maritime, et en soirée, le magnifique feu d’artifice entre 23h et 23h30.
                    Congrès du Mérite Maritime
                    Tir d’un feu d’artifice vers 23h00
                </p>
            </div>
            <div class="col col-lg-2"></div>
        </div>
    </div> 
</div>

<?php require_once 'inc/footer.inc.php'; ?>