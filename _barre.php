<div class="barre">
    <h3 class="b ordi">Commande - </h3>
    <?php
        $noms = $_SESSION['noms'];
        $count = count($noms);
        for ($i = 0; $i < $count; $i++){
            echo '<h3 class="d ordi">'.$noms[$i].' - </h3>';
        }
        echo '<h3 class="d mobile"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;'.$count.'&nbsp;</h3>';
    ?>
    <h3 class="d"><a class="btn-b" href="apercu.php">Voir ma commande</a></h3>
</div>