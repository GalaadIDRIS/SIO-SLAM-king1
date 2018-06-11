<?php

    require '_header.php';
    require '_menu.php';

    //SI L'UTILISATEUR EST CONNECTE
    if(isset($_SESSION['id'])){
        
        //SI L'ID DE LA PIZZA SONT VIDES...
        if ($_POST['pizza'] == null) {
            
            //...MESSAGE D'ERREUR
            echo '<h3 class="center top">Vous n\'avez pas sélectionné de pizza, retournez en arrière et recommencez.</h3>';
            
        //SINON, SI IL SONT REMPLIS...
        } else {
            
            $delete_pizzas = $bdd->prepare('DELETE FROM pizzas WHERE nom = ?');
            $delete_pizzas->execute(array($_POST['pizza']));
            //print_r($delete_pizzas->errorInfo());
            $delete_pizzas->closeCursor();
            
            //MESSAGE DE CONFIRMATION
            echo '
                <div class="center top">
                    <p class="d">La pizza <b>'.htmlspecialchars($_POST['pizza']).'</b> a été supprimé</p>
                    <a href="administration.php" class="btn-b">Retour</a>
                </div>';
        }    
    } else {
        echo'
            <div class="center top">
                <p class="d">Vous devez être connecté pour supprimer une pizza.</p>
                <a href="connexion.php" class="btn-b">Connexion</a><a href="index.php" class="btn-r">Accueil</a>
            </div>';
    }

?>

</body>
</html>
