<?php require '_header.php';

    //ON RECOIT LE PSEUDO ET LE MDP DEPUIS CONNEXION.PHP
    $nom = $_POST['nom'];
    $mdp = $_POST['mdp'];
    $mdp_md5 =  md5($mdp,false);

    //ON VERIFIE LES IDENTIFIANTS
    $connexion = $bdd->prepare('SELECT id FROM admin WHERE nom = :nom AND mdp = :mdp');
    $connexion->execute(array('nom' => $nom, 'mdp' => $mdp_md5));
    $resultat = $connexion->fetch();

    //SI LES IDENTIFIANTS NE CORRESPONDENT PAS A CE QUI A ETE RECU...
    if (!$resultat){
        
        //...ON AFFICHE LE MESSAGE D'ERREUR
        echo'
            <h1 class="title">ADMINISTRATION</h1>
            <div class="center">
                <p class="d">Mauvais identifiants</p>
                <a href="connexion.php" class="btn-r">Retour</a>
            </div>';
        
    }

    //SINON...
    else {
        
        //...ON ACTIVE LA SESSION ET LES VARIABLE ID ET PSEUDO
        session_start();

        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        
        //PUIS ON REDIRIGE VERS LA PAGE ADMINISTRATION
        header('Location: administration.php');
    }
?>

    </body>
</html>