<?php 
    
    require '_header.php';
    require '_menu.php';

?>

<div class="container-5">
    <div class="dawn-grid">
        <div class="g-12">
            <h2 class="b">Aperçu de votre commande</h2>
            <br>
            
            <?php
            
                //ON MET LES VALEURS DES VARIABLES DE SESSIONS DANS DES TABLEAUX
                $client = $_SESSION['client'];
                $ids = $_SESSION['ids'];
                $noms = $_SESSION['noms'];
                $formats = $_SESSION['formats'];
                $prix = $_SESSION['prix'];

                //ON COMPTE LE NOMBRE DE PIZZAS QUE L'UTILISATEUR A COMMANDE
                $count = count($ids);

                //var_dump($count);

                //ON PARCOURS LES TABLEAUX POUR AFFICHER LE PIZZAS COMMANDEES
                for ($i = 0; $i < $count; $i++){
                    echo'<p class="d"> &gt '.$noms[$i].' - '.$formats[$i].' - '.$prix[$i].'€</p>';
                }

                $final = 0;

                //ON COMPTE LE PRIX TOTAL DE LA COMMANDE
                for($i = 0; $i < $count; $i++){
                    $final = $final + $prix[$i];
                }

                echo '<br><h3 class="b">Total : '.$final.'€</h3>'

            ?>
            <form class="dawn-form" action="action.php" method="post">
                <input class="i-3 i-r" type="text" name="nom" placeholder="Prénom">
                <input class="i-3 i-l" type="text" name="tel" placeholder="Téléphone">
                <input type="hidden" name="confirm">&nbsp;
                <input type="submit" class="btn-v" value="Confirmer"><a class="btn-b" href="action.php?action=restart">Recommencer</a><a class="btn-r" href="action.php?action=cancel">Annuler</a>
            </form>
        </div>
    </div>
</div>

<?php require '_footer.php'; ?>
