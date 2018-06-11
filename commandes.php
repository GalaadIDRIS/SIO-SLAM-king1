<?php

    session_start();

    if(!isset($_SESSION['client'])){
        $_SESSION['client'] = "";
        $_SESSION['ids'] = array();
        $_SESSION['noms'] = array();
        $_SESSION['formats'] = array();
        $_SESSION['prix'] = array();
        $_SESSION['total'] = null;
    }

    try{
        $bdd = new PDO('mysql:host=localhost; dbname=kingpizza; charset=utf8', 'root', '');   
    } catch(PDOException $e){
        die('ERREUR :: '.$e->getMessage());
    }

    require '_menu.php';

?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="refresh" content="60; url=commandes.php">
        
        <title>King Pizza - Pizzeria à Grenoble</title>
        
        <link rel="icon" type="image/png" href="css/images/icone.png" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/barre.css">
        <link rel="stylesheet" href="css/menu.css">
        <link rel="stylesheet" href="css/menuResponsive.css">
        <link rel="stylesheet" href="css/dawn.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>

    <div class="container-5">
        <div class="dawn-grid">
            <div class="g-12">
                <h2 class="b">Commandes</h2>

                <?php
                
                $actualisation = date("H:i");
                $boucle = 1;
            
                if (isset($_SESSION['id'])){

                    $client = $bdd->prepare("SELECT clients.id as id_client, clients.nom as nom_client, tel FROM clients ORDER BY id_client ASC");
                    $client->execute();

                    while($aff_client = $client->fetch()){

                        echo '
                            <div class="dawn-card">
                                <div class="dawn-card-content">
                                    <div class="infos">
                                        <h2 class="b">'.htmlspecialchars($aff_client['id_client']).'</h2><h3 class="d">&nbsp;'.htmlspecialchars($aff_client['nom_client']).' - '.htmlspecialchars($aff_client['tel']).'</h3>
                                    </div>';

                        //var_dump($aff_client['id_client']);
                        $id = $aff_client['id_client'];

                        $commande = $bdd->prepare("SELECT pizzas.nom as nom_pizza, format, prix FROM pizzas, clients, commandes WHERE pizzas.id = commandes.pizza AND clients.id = :id AND commandes.client = :id");
                        $commande->bindValue('id', $id, PDO::PARAM_STR);
                        $commande->execute();

                        $total = 0.00;

                        while($aff_commande = $commande->fetch()){
                            echo '<p class="d"><small><i class="fa fa-circle"></i></small> '.htmlspecialchars($aff_commande['nom_pizza']).' - '.htmlspecialchars($aff_commande['format']).' - '.htmlspecialchars($aff_commande['prix']).'€</p>';
                            $total = $total + htmlspecialchars($aff_commande['prix']);
                        }

                        //var_dump($aff_client['id_client']);
                        
                        echo '
                            <h3 class="o">Total : '.$total.'€</h3>
                            <form class="dawn-form" method="post" action="fini.php">
                                <input type="hidden" name="pizza" value="'.htmlspecialchars($aff_client['id_client']).'">
                                <input class="btn-b" type="submit" value="Commande terminée">
                            </form>';

                        /*
                        print_r($commande->errorInfo());
                        print_r($commande->errorCode());
                        */

                        $commande->closeCursor();
                        
                        echo'</div></div>';
                    }
                    
                    /*
                    print_r($client->errorInfo());
                    print_r($client->errorCode());
                    */

                    $client->closeCursor();
                } else {
                    header('Location: connexion.php');
                }

                echo'</div></div></div>';

?>
    </body>
</html>