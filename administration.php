<?php 

    require '_header.php';
    require '_menu.php';

    if (isset($_SESSION['id'])){

?>

        <div class="dawn-grid">
            <div class="g-4">&nbsp</div>
            <div class="g-4">
                <h1 class="b"><br><br>Administration</h1>
                <a href="commandes.php" class="btn-b">Accéder aux commandes</a>
                <h4 class="top d">Ajouter un sandwich ou une boisson</h4>
                <form class="dawn-form" method="post" action="pizza-ajout.php" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="20000000"><!-- TAILLE MAX 20Mo -->
                    <input class="i-4" type="file" name="photo"><br><!-- BOUTON 'PARCOURIR' --><br>
                    <input class="i-4" type="text" name="nom" id="nom" placeholder="Nom de la pizza">
                    <textarea class="i-4" name="description" id="description" placeholder="Description"></textarea>
                    <input class="i-2 i-r" type="text" name="prix_med" id="prix_seul" placeholder="Prix format medium">
                    <input class="i-2 i-l" type="text" name="prix_fam" id="prix_menu" placeholder="Prix format familliale">
                    <input class="btn-b" type="submit" name="envoyer" value="Ajouter"/>
                </form>
            </div>
            <div class="g-4">&nbsp</div>
        </div>
        <div class="dawn-grid">
            <div class="g-4">&nbsp</div>
            <div class="g-4">
                <h4 class="top d">Modifier un produit</h4>
                <form class="dawn-form" method="get" action="pizza-edit.php">
                    <select class="i-4" name="pizza" id="pizza">
                    <?php
                        //ON RECUPERE LES NOMS DES PIZZAS
                        //ON ORGANISE LE TOUT PAR ORDRE ALPHABETIQUE
                        $reponse = $bdd->query('SELECT nom FROM pizzas ORDER BY nom');
                        $reponse->execute();
                        while($donnees = $reponse->fetch())
                        {
                            echo '<option>' . htmlspecialchars($donnees['nom']) . '</option>';
                        }
                        $reponse->closeCursor();
                    ?>
                    </select>
                    <input class="btn-b" type="submit" value="Modifier">
                </form>
            </div>
            <div class="g-4">&nbsp</div>
        </div>
        <div class="dawn-grid">
            <div class="g-4">&nbsp</div>
            <div class="g-4">
                <h4 class="top d">Supprimer un produit</h4>
                <form class="dawn-form" method="post" action="pizza-supp.php">
                    <select class="i-4" name="pizza" id="pizza">
                    <?php
                        //ON RECUPERE LES NOMS DES PIZZAS
                        //ON ORGANISE LE TOUT PAR ORDRE ALPHABETIQUE
                        $reponse = $bdd->query('SELECT nom FROM pizzas ORDER BY nom');
                        $reponse->execute();
                        while($donnees = $reponse->fetch())
                        {
                            echo '<option>' . htmlspecialchars($donnees['nom']) . '</option>';
                        }
                        $reponse->closeCursor();
                    ?>
                    </select>
                    <input class="btn-b" type="submit" value="Supprimer">
                </form>
            </div>
            <div class="g-4">&nbsp</div>
        </div>
        <div class="dawn-grid">
            <div class="g-4">&nbsp</div>
            <div class="g-4">
                <h4 class="top d">Créer un utilisateur</h4>
                <form class="dawn-form" method="post" action="admin-ajout.php">
                    <input class="i-4 i-r" type="text" name="nom" id="nom" placeholder="Nom">
                    <input class="i-4" type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                    <input class="btn-b center" type="submit" value="Créer"/>
                </form>
            </div>
            <div class="g-4">&nbsp</div>
        </div>
        <div class="dawn-grid">
            <div class="g-4">&nbsp</div>
            <div class="g-4">
                <h4 class="top d">Supprimer un admin</h4>
                <form class="dawn-form" method="post" action="admin-supp.php">
                    <select class="i-4" name="admin" id="admin">
                    <?php
                        //ON RECUPERE LES NOMS DES ADMINS
                        //ON ORGANISE LE TOUT PAR ORDRE ALPHABETIQUE
                        $reponse = $bdd->query('SELECT nom FROM admin ORDER BY nom');
                        $reponse->execute();
                        while($donnees = $reponse->fetch())
                        {
                            echo '<option>' . htmlspecialchars($donnees['nom']) . '</option>';
                        }
                        $reponse->closeCursor();
                    ?>
                    </select>
                    <input class="btn-b" type="submit" value="Supprimer">
                </form>
            </div>
            <div class="g-4">&nbsp</div>
        </div>

<?php
    
    } else {
        header('Location: connexion.php');
    } 
?>

    </body>
</html>