<?php

    require '_header.php';

    //SI AUCUN ID NI AUCUN FORMAT N'ONT ETE DEFINI...
    if ((!isset($_GET['id'])) || (!isset($_GET['format']))){
                
        //...ON REDIRIGE VERS LA PAGE DES PIZZAS
        header('Location: pizzas.php');
        //print_r('AUCUN ID ENVOYER');
        
    } else {
        
        /*
        var_dump($_GET['id']);
        var_dump($_GET['nom']);
        var_dump($_GET['format']);
        var_dump($_GET['prix']);
        */
        
        //print_r("niveau 1");
        
        //SI LE FORMAT ET MOYEN...
        if($_GET['format'] == 'medium'){
            
            //ON VERIFIE QUE L'ID DE LA PIZZA ENVOYE CORRESPOND A UNE PIZZA EXISTENTE
            $select_pizzas = $bdd->prepare("SELECT * FROM pizzas WHERE id = ?");
            $select_pizzas->execute(array($_GET['id']));
            while($data_pizzas = $select_pizzas->fetch()){
                
                //SI L'ID 
                
                array_push($_SESSION['ids'], $data_pizzas['id']);
                array_push($_SESSION['noms'], $data_pizzas['nom']);
                array_push($_SESSION['prix'], $data_pizzas['prix_med']);
                array_push($_SESSION['formats'], $_GET['format']);
                
                echo'
                    <div class="container-5">
                        <div class="dawn-grid">
                            <div class="g-6 center">
                                <p>Votre pizza '.$data_pizzas['nom'].' au format '.$_GET['format'].' a été ajouté à votre panier</p>
                                <p><a class="btn-v" href="pizzas.php">Continuer ma commande</a></p>
                                <p><a class="btn-b" href="apercu.php">Terminer ma commande</a></p>
                                <p><a class="btn-r" href="action.php?action=restart">Annuler ma commande</a></p>
                            </div>
                        </div>
                    </div>';
                
                
                /*
                var_dump($data_pizzas['id']);
                var_dump($data_pizzas['nom']);
                var_dump($data_pizzas['prix_med']);
                */
                
                //print_r('niveau 2 :: medium');
                
            }
            
            //var_dump($select_pizzas->errorInfo());
            //var_dump($select_pizzas->errorCode());
            
            $select_pizzas->closeCursor();
            
        } elseif($_GET['format'] == 'familliale'){
            
            $select_pizzas = $bdd->prepare("SELECT * FROM pizzas WHERE id = ?");
            $select_pizzas->execute(array($_GET['id']));
            while($data_pizzas = $select_pizzas->fetch()){
                
                array_push($_SESSION['ids'], $data_pizzas['id']);
                array_push($_SESSION['noms'], $data_pizzas['nom']);
                array_push($_SESSION['prix'], $data_pizzas['prix_fam']);
                array_push($_SESSION['formats'], $_GET['format']);
                
                echo'
                    <div class="container-5">
                        <div class="dawn-grid">
                            <div class="g-6 center">
                                <p>Votre pizza '.$data_pizzas['nom'].' au format '.$_GET['format'].' a été ajouté à votre panier</p><br>
                                <p><a class="btn-v" href="pizzas.php">Continuer ma commande</a></p>
                                <p><a class="btn-b" href="apercu.php">Terminer ma commande</a></p>
                                <a class="btn-r" href="action.php?action=restart">Annuler ma commande</a>
                            </div>
                        </div>
                    </div>';
                
                /*
                var_dump($data_pizzas['id']);
                var_dump($data_pizzas['nom']);
                var_dump($data_pizzas['prix_fam']);
                */
                
                //print_r('niveau 2 :: familliale');
                
                /*
                print_r($data_pizzas['id']);
                print_r($data_pizzas['nom']);
                print_r($data_pizzas['prix_fam']);
                */
                
            }
            
            /*
            print_r($select_pizzas->errorInfo());
            print_r($select_pizzas->errorCode());
            */
            
            /*
            print_r($_SESSION['ids']);
            print_r($_SESSION['noms']);
            print_r($_SESSION['prix']);
            print_r($_SESSION['formats']);
            */
            
            $select_pizzas->closeCursor();
            
        } elseif(($_GET['format'] != 'medium')&&($_GET['format'] != 'familliale')){
            
            header('Location: pizzas.php');
            //echo 'FOR - NEXISTE PAS !';
            
        } 
        
    }

    //header('Location: pizzas.php');

?>
    </body>
</html>