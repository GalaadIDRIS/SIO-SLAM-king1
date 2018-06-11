<?php

    require '_header.php';
    require '_menu.php';

    //SI LE BOUTON CONFIRMER A ETE CLIQUE...
    if(isset($_POST['confirm'])){
        
        //ON RECUPERE LES INFOS ENVOYEES DEPUIS LA PAGE 'APERCU.PHP'...
        $nom = $_POST['nom'];
        $tel = $_POST['tel'];
        $date = date("Y-m-d H:i:s");
        
        //ON INSERE LE NOM DU CLIENT DANS LA TABLE 'CLIENT'
        $insert_clients = $bdd->prepare("INSERT INTO clients(nom, tel, jour) VALUES(?, ?, ?)");
        $insert_clients->execute(array($nom, $tel, $date));
        $insert_clients->closeCursor();
        if ($insert_clients){
            
            //ON FAIT UNE REQUETE POUR VERIFIER QUE L'UTILISATEUR A BIEN ETE INSERE
            $select_clients = $bdd->prepare("SELECT id FROM clients WHERE nom = :nom AND jour = :date");
            $select_clients->execute(array('nom' => $nom, 'date' => $date));
            $data_clients = $select_clients->fetch();

            if($select_clients){
                
                //ON CREER LA VARIABLE DE SESSION 'CLIENT'
                $_SESSION['client'] = $data_clients['id'];
                
            }
            
            $select_clients->closeCursor();
        }
        
        //print_r($_SESSION['client']);
        
        //ON REDIRIGE VERS 'ENREGISTREMENT.PHP'
        header('Location: enregistrement.php');
        
    } 

    //SI L'UTILISATEUR A CLIQUER SUR 'RECOMMENCER'...
    elseif ($_GET['action'] == 'restart'){
        
        //SUPPRESSION DES VARIABLES DE SESSIONS ET DE LA SESSION
        $_SESSION = array();
        session_destroy();
        
        echo'
            <div class="container-5">
                <div class="dawn-grid">
                    <div class="g-6 center">
                        <p>Votre commande a été annulé</p>
                        <a class="btn-b" href="pizzas.php">Recommencer</a><span>&nbsp;</span><a class="btn-v" href="index.php">Accueil</a>
                    </div>
                </div>
            </div>';
        
    } 

    //SI L'UTILISATEUR A CLIQUER SUR 'ANNULER'...
    elseif ($_GET['action'] == 'cancel'){
        
        //SUPPRESSION DES VARIABLES DE SESSIONS ET DE LA SESSION
        $_SESSION = array();
        session_destroy();
        
        echo'
            <div class="container-5">
                <div class="dawn-grid">
                    <div class="g-6 center">
                        <p>Votre commande a été annulé</p>
                        <a class="btn-v" href="index.php">Accueil</a>
                    </div>
                </div>
            </div>';
        
    } else {
        
        //SI AUCUN BOUTON N'A ETE CLIQUE...
        header('Location: http://www.leparisien.fr/une/le-piratage-est-passible-de-prison-et-d-amendes-14-05-2011-1449120.php');
        
    }

?>

</body>
</html>