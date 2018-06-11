<?php

    require '_header.php';

    //ON RECUPERE LE CONTENU DES VARIABLES DE SESSIONS DANS D'AUTRES TABLEAUX 
    $client = $_SESSION['client'];
    $ids = $_SESSION['ids'];
    $noms = $_SESSION['noms'];
    $formats = $_SESSION['formats'];
    $prix = $_SESSION['prix'];

    /*
    var_dump($ids);
    var_dump($noms);
    var_dump($formats);
    var_dump($prix);
    */

    //ON COMPTE LE NOMBRE DE PIZZAS COMMANDÉESr
    $count = count($ids);

    $compteur;

    //var_dump($count);

    //ON ENREGISTRE TOUTES LES INFORMATIONS CONTENUES DANS LES VARIABLES DE SESSIONS DANS LA TABLE 'COMMANDES'
    for ($i = 0; $i < $count; $i++) {
        $insert_commandes = $bdd->prepare("INSERT INTO commandes(client, pizza, format, prix) VALUES(?, ?, ?, ?)");
        $insert_commandes->execute(array($_SESSION['client'], $ids[$i], $formats[$i], $prix[$i]));        
        $insert_commandes->closeCursor();
        
        $select_compteur = $bdd->prepare("SELECT compteur FROM pizzas WHERE id = ?");
        $select_compteur->execute(array($ids[$i]));
        while($data_compteur = $select_compteur->fetch()){
            $compteur = $data_compteur['compteur'];
        }
        //print_r($select_compteur->errorInfo());
        $select_compteur->closeCursor();
        
        $compteur = $compteur + 1;
        
        $insert_compteur = $bdd->prepare("UPDATE pizzas SET compteur = ? WHERE id = ?");
        $insert_compteur->execute(array($compteur, $ids[$i]));
        //print_r($insert_compteur->errorInfo());
        $insert_compteur->closeCursor();
        
    }

    //ON REDIRIGE VERS LA PAGE DE CONFIRMATION
    header('Location: confirmation.php');
        
    /*
    var_dump($_SESSION['ids']);
    var_dump($_SESSION['noms']);
    var_dump($_SESSION['formats']);
    var_dump($_SESSION['prix']);
    var_dump($_SESSION['client']);
    var_dump($_SESSION['enregistrement']);
    */

?>

</body>
</html>