<?php 

    require '_header.php';
    require '_menu.php';
    
    //ON RECOIT LE NOM DE LA PIZZA DEPUIS 'ADMINISTRATION.PHP'
    $pizza = $_GET['pizza'];

    //ON VERIFIE SI UN NOM A BIEN ETE TRANSMIT
    if (!isset($_GET['pizza'])){
                
        //header('Location: commande.php');
        print_r('AUCUN ID ENVOYER');
    
    } else {
        
        //ON VERIFIE SI LA PIZZA EXISTE EN RENTRANT SON NOM DANS UNE REQUETE
        $query_pizzas = $bdd->prepare("SELECT id FROM pizzas WHERE nom = ?");
        $query_pizzas->execute(array($_GET['pizza']));
        
        while($resultat = $query_pizzas->fetch()){
            
            //ON RECUPERE TOUTES LES INFOS DE LA PIZZA QUI CORRESPOND A L'ID TRANSMIS
            $select_pizzas = $bdd->prepare("SELECT * FROM pizzas WHERE id = ? ");
            $select_pizzas->execute(array($resultat['id']));
            while ($data_pizzas = $select_pizzas->fetch()) {

                //AFFICHAGE DU FORMULAIRE POUR MODIFIER
                echo '
                    <div class="dawn-grid">
                        <div class="g-4">&nbsp</div>
                        <div class="g-4">
                            <h4 class="d top">Modifier la pizza '.$_GET['pizza'].'</h4>
                            <form class="dawn-form" method="post" action="pizza-modif.php" enctype="multipart/form-data">
                                <input type="hidden" name="MAX_FILE_SIZE" value="20000000">
                                <input class="i-4" type="file" name="photo"><br><br>
                                <input class="i-4" type="text" name="nom" id="nom" value="'.htmlspecialchars($data_pizzas['nom']).'">
                                <textarea class="i-4" name="description" id="description">'.htmlspecialchars($data_pizzas['description']).'</textarea>
                                <input class="i-2 i-r" type="text" name="prix_med" id="prix_med" value="'.htmlspecialchars($data_pizzas['prix_med']).'">
                                <input class="i-2 i-l" type="text" name="prix_fam" id="prix_fam" value="'.htmlspecialchars($data_pizzas['prix_fam']).'">
                                <input class="i-4" type="hidden" name="id" id="id" value="'.htmlspecialchars($data_pizzas['id']).'"><br/>
                                <input class="btn-b center" type="submit" value="Modifier"/><span>&nbsp</span><a class="btn-r" href="administration.php">Retour</a>
                            </form>
                        </div>
                        <div class="g-4">&nbsp</div>
                    </div>
                </body>
            </html>';
                
            }
            
            $select_pizzas->closeCursor();
            
        }
        
        $query_pizzas->closeCursor();
        
    }

    //print_r($reponse->errorInfo());

?>