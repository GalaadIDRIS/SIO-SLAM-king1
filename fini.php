<?php

    require '_header.php';

    if(isset($_SESSION['id'])){
        
        //SI LE NOM, LE TYPE OU LE PRIX SEUL SONT VIDES...
        if (!isset($_POST['pizza'])) {
            
            //...MESSAGE D'ERREUR
            echo 'Vous n\'avez rien à faire ici, retournez en arrière.';
            
        //SINON, SI IL SONT REMPLIS...
        } else {
            
            $delete_commandes = $bdd->prepare('DELETE FROM commandes WHERE commandes.client = ?');
            $delete_commandes->execute(array($_POST['pizza']));
            
            var_dump($_POST['pizza']);
            print_r($delete_commandes->errorInfo());
            print_r($delete_commandes->errorCode());
            
            $delete_commandes->closeCursor();
            
            
            $delete_clients = $bdd->prepare('DELETE FROM clients WHERE clients.id = ?');
            $delete_clients->execute(array($_POST['pizza']));
            $delete_clients->closeCursor();
            
            //ON REDIRIGE VERS LA LISTE DE TOUTES LES COMMANDES
            header('Location: commandes.php');
            
        }    
    } else {
        echo'
            <div class="center">
                <p class="d">Vous devez être connecté.</p>
                <a href="connexion.php" class="btn-b">Connexion</a><a href="index.php" class="btn-r">Accueil</a>
            </div>';
    }

?>

    </body>
</html>
