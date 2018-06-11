<?php

    require '_header.php';

    //SI LE NOM, LE COMMENTAIRE OU LA NOTE SONT VIDES...
    if (($_POST['nom'] == null) || ($_POST['commentaire'] == null) || ($_POST['note'] == null)) {
        
        //...MESSAGE D'ERREUR
        echo 'Vous n\'avez pas rempli tout les champs de texte obigatoire :-(, retournez en arrière et recommencez.';
        
    //SINON, SI IL SONT REMPLIS...
    } else {
        
        $date = date("Y-m-d H:i:s");
        
        $req = $bdd->prepare('INSERT INTO avis (note, nom, commentaire, date) VALUES(?, ?, ?, ?)');
        $req->execute(array($_POST['note'], $_POST['nom'], $_POST['commentaire'], $date)) or die ( print_r($req->errorInfo()) );
        
        //...MESSAGE DE CONFIRMATION
        echo'
            <div class="center">
                <p class="d">Votre avis a bien été transmis.</p>
                <a href="index.php" class="btn-b">Accueil</a>
            </div>';
    }
    
    require '_footer.php';

?>