<?php

    require '_header.php';

    if(isset($_SESSION['id'])){
        
        //SI LE NOM, LE TYPE OU LE PRIX SEUL SONT VIDES...
        if (($_POST['nom'] == null) || ($_POST['mdp'] == null)) {
            
            //...MESSAGE D'ERREUR
            echo 'Vous n\'avez pas rempli tout les champs de texte, retournez en arrière et recommencez.';
            
        //SINON, SI IL SONT REMPLIS...
        } else {
            
            $mdp = $_POST['mdp'];
            $mdp_md5 =  md5($mdp,false);
            
            $req = $bdd->prepare('INSERT INTO admin (nom, mdp) VALUES(?, ?)');
            $req->execute(array($_POST['nom'], $mdp_md5)) or die ( print_r($req->errorInfo()));
            
            //MESSAGE DE CONFIRMATION
            echo '
                <div class="center">
                    <p class="d">Le compte administrateur <b>'.htmlspecialchars($_POST['nom']).'</b> a été créé</p>
                    <a href="administration.php" class="btn-b">Retour</a>
                </div>';
        }    
    } else {
        echo'
            <div class="center">
                <p class="d">Vous devez être connecté pour ajouter un administrateur.</p>
                <a href="connexion.php" class="btn-b">Connexion</a><a href="index.php" class="btn-r">Accueil</a>
            </div>';
    }

    require '_footer.php';

?>