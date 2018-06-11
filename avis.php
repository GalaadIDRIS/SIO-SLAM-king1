<?php

    require '_header.php';
    require '_menu.php';

?>

<div class="container-5">
    <div class="content">
        <div class="avis">
            <h2 class="b bottom">Avis des clients</h2>
            <?php
                //ON RECUPERE TOUT DEPUIS AVIS
                //ON ORGANISE LE TOUT EN FONCTION DE L'ID PAR ORDRE DECROISSANT ET LIMITE A 3 SEULEMENT
                $avis = $bdd->query('SELECT * FROM avis ORDER BY ID DESC LIMIT 3');
                while ($donnees = $avis->fetch())
                {
                    //AFFICHAGE DES AVIS
                    echo '
                    <div class="dawn-card">
                        <div class="dawn-card-content">
                            <span class="p">'.htmlspecialchars($donnees['note']).'/5</span><span class="gy"> - </span><span class="b">'.htmlspecialchars($donnees['nom']).'</span><span class="gy"> - '.htmlspecialchars($donnees['date']).'</span>
                            <p>'.htmlspecialchars($donnees['commentaire']).'</p>
                        </div>
                    </div>';
                    }

                $avis->closeCursor();
            ?>
        </div>
        <div class="avis">
            <h2 class="b bottom">Donnez votre avis</h2>
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

<?php require '_footer.php'; ?>