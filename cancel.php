<?php

    require '_header.php';
    require '_menu.php';

    $id = $_POST['id'];

    //var_dump($id);

    $delete_clients = $bdd->prepare('DELETE FROM clients WHERE clients.id = ?');
    $delete_clients->execute(array($id));
    $delete_clients->closeCursor();

    $delete_commandes = $bdd->prepare('DELETE FROM commandes WHERE commandes.client = ?');
    $delete_commandes->execute(array($id));
    $delete_commandes->closeCursor();
    echo '
        <div class="center top">
            <p class="d">Votre commande numéros <b>'.$id.'</b> a été annulé.</p>
            <a href="index.php" class="btn-b">Accueil</a>
        </div>
    </body>
</html>';

    /*
    print_r($delete_clients->errorInfo());
    print_r($delete_clients->errorCode());
    */


?>