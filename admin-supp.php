<?php

    require '_header.php';

    if(isset($_SESSION['id'])){
        
        //SI LE NOM, LE TYPE OU LE PRIX SEUL SONT VIDES...
        if ($_POST['admin'] == null) {
            
            //...MESSAGE D'ERREUR
            echo 'Vous n\'avez pas sélectionné d\'administrateur, retournez en arrière et recommencez.';
            
        //SINON, SI IL SONT REMPLIS...
        } else {
            
            $req = $bdd->prepare('DELETE FROM admin WHERE nom = ?');
            $req->execute(array($_POST['admin']));
            
            //MESSAGE DE CONFIRMATION
            echo '
                <div class="center">
                    <p class="d">Le compte administrateur <b>'.htmlspecialchars($_POST['admin']).'</b> a été supprimé</p>
                    <a href="administration.php" class="btn-b">Retour</a>
                </div>';
        }    
    } else {
        echo'
            <div class="center">
                <p class="d">Vous devez être connecté pour supprimer un administrateur.</p>
                <a href="connexion.php" class="btn-b">Connexion</a><a href="index.php" class="btn-r">Accueil</a>
            </div>';
    }

    require '_footer.php';

?>
