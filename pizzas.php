<?php 

    require '_header.php';
    require '_menu.php';
    require '_barre.php';

?>

<div class="container-3">
    <div class="container-bkg">
        <h2>Découvrez toutes nos pizzas</h2>
    </div>
</div>
<div class="container-4">
    <div class="content">
        <?php 
            $select_pizzas = $bdd->prepare('SELECT * FROM pizzas ORDER BY id');
            $select_pizzas->execute();
            while($data_pizzas = $select_pizzas->fetch()){
                echo'
                    <div class="element">
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

            /*
            print_r($select_pizzas->errorInfo());
            print_r($select_pizzas->errorCode());
            */
            
            $select_pizzas->closeCursor();

            /*
            print_r($_SESSION['ids']);
            print_r($_SESSION['noms']);
            print_r($_SESSION['prix']);
            print_r($_SESSION['formats']);
            */
        ?>
    </div>
</div>

<?php require '_footer.php'; ?>
