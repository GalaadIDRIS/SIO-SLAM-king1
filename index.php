<?php 

    require '_header.php'; 
    require '_menu.php'; 

?>

    <div class="main">
        <div class="container-1">
            <div class="container-bkg">
                <h1>Bienvenue chez les Rois de la pizza !<br><a class="btn-o" href="pizzas.php">Commandez en ligne</a></h1>
            </div>
        </div>

        <div class="container-2">
            <h1>King Pizza, quand on connait on préfère !</h1>
            <h1><i class="fa fa-phone"></i> 04.85.02.79.22</h1>
            <div class="center top bottom"><a class="big-btn-b" href="pizzas.php">Commandez en ligne</a></div>
            <div class="dawn-grid top">
                <div class="g-5">
                    <img src="css/images/king03.jpg">
                    <h2>Des pizzas et de la bonne humeur</h2>
                    <p>Ici, en plus de pizzas faites avec amour, vous serez accueillis dans une ambiance chaleureuse, détendue et comique.</p>
                </div>
                <div class="g-2">&nbsp;</div>
                <div class="g-5">
                    <img src="css/images/king02.jpg">
                    <h2>A partir de 4,90€</h2>
                    <p>Grosse faim mais petit budget ?! Vous allez être servis !<br>Chez nous, vous trouverez la pizza qu’il vous faut, faite maison et réalisée en 15mn</p>
                </div>
            </div>
        </div>

        <div class="container-3">
            <div class="container-bkg">
                <h2>Petite terrasse conviviale<br>Boissons fraiches<br>Bonne humeur garantie</h2>
            </div>
        </div>

        <div class="container-4">
            <div class="content">
                <div class="center bottom"><h1>Nos pizzas les plus commandées</h1></div>
                <?php 
                $select_pizzas = $bdd->prepare('SELECT * FROM pizzas ORDER BY compteur DESC LIMIT 4');
                $select_pizzas->execute();
                while($data_pizzas = $select_pizzas->fetch()){
                    echo'
                        <div class="element bottom">
                            <div class="img"><img src="upload/'.htmlspecialchars($data_pizzas['image']).'"></div>
                            <div class="text">
                                <h3>'.htmlspecialchars($data_pizzas['nom']).'</h3>
                                <p>'.htmlspecialchars($data_pizzas['description']).'</p>
                                <p class="cmd"><a class="btn-b" href="add.php?id='.htmlspecialchars($data_pizzas['id']).'&nom='.htmlspecialchars($data_pizzas['nom']).'&prix='.htmlspecialchars($data_pizzas['prix_med']).'&format=medium">medium</a><small>'.htmlspecialchars($data_pizzas['prix_med']).'€</small></p>
                                <p class="cmd"><a class="btn-b" href="add.php?id='.htmlspecialchars($data_pizzas['id']).'&nom='.htmlspecialchars($data_pizzas['nom']).'&prix='.htmlspecialchars($data_pizzas['prix_fam']).'&format=familliale">familliale</a><small>'.htmlspecialchars($data_pizzas['prix_fam']).'€</small></p>
                            </div>
                        </div>
                    ';
                }
                ?>
                <div class="center"><h1 class="center top bottom"><a class="big-btn-b" href="pizzas.php">Voir plus de pizzas</a></h1></div>
            </div>
        </div>
        <div class="container-5 hide">
            <div class="content">
                <div class="avis">
                    <?php
                        echo '<h4 class="top d">Avis des clients</h4>';
                        //ON RECUPERE TOUT DEPUIS AVIS
                        //ON ORGANISE LE TOUT EN FONCTION DE L'ID PAR ORDRE DECROISSANT ET LIMITE A 3 SEULEMENT
                        $select_avis = $bdd->query('SELECT * FROM avis ORDER BY ID DESC LIMIT 3');
                        while ($data_avis = $select_avis->fetch())
                        {
                            //AFFICHAGE DES AVIS
                            echo '
                            <div class="dawn-card">
                                <div class="dawn-card-content">
                                    <span class="p">'.htmlspecialchars($data_avis['note']).'/5</span><span class="gy"> - </span><span class="b">'.htmlspecialchars($data_avis['nom']).'</span><span class="gy"> - '.htmlspecialchars($data_avis['date']).'</span>
                                    <p>'.htmlspecialchars($data_avis['commentaire']).'</p>
                                </div>
                            </div>';
                            }

                        echo '<a href="avis.php" class="">Plus d\'avis</a>';

                        $select_avis->closeCursor();
                    ?>
                </div>
                <div class="avis">
                    <h4 class="top d">Donnez votre avis</h4>
                        <form class="dawn-form" method="post" action="avis-ajout.php">
                            <input class="i-3" type="text" name="nom" id="nom" placeholder="Nom">
                            <select class="i-3 i-l" name="note" id="note">
                                <option>Note</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <textarea class="i-6" name="commentaire" id="commentaire" placeholder="Commentaire"></textarea>
                            <input class="btn-b" type="submit" value="Envoyer"/>
                      </form>
                </div>
            </div>
        </div>
    </div>

<?php require '_footer.php'; ?>
