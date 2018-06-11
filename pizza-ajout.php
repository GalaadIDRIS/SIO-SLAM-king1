<?php

    require '_header.php';


    //SI L'UTILISATEUR EST CONNECTE
    if(isset($_SESSION['id'])){
        
        $dossier = 'upload/'; // Fait référence au dossier où sont enregistrées les images.
        $fichier = basename($_FILES['photo']['name']); // Contient le nom et l'extention de l'image envoyé par l'utilisateur.
        $taille_maxi = 20000000; // Fait référence à la taille maximale autorisée pour chaque image (ici 20Mo).
        $taille = filesize($_FILES['photo']['tmp_name']); // Contient la taille de l'image envoyé.
        $extensions = array('.PNG', '.png', 'JPG', '.jpg', 'JPEG', '.jpeg'); // Défini ici les extensions autorisées.
        $extension = strrchr($_FILES['photo']['name'], '.');
        
        if(!in_array($extension, $extensions)){ //Si l'extension n'est pas dans le tableau...
            $erreur = "ERREUR 01 :: Extension de fichier non accepté";
            echo '
                <div class="center top">
                    <p class="d">L\'extension de votre fichier n\'est pas autorisée.</p>
                    <a href="administration.php" class="btn-r">Retour</a>
                </div>'; 
        }
        if($taille > $taille_maxi){ //Si la taille du fichier est supérieure à la taille autorisé...
            $erreur = "ERREUR 02 :: Fichier trop gros";
            echo '
                <div class="center top">
                    <p class="d">Vous ne pouvez uploader que des fichiers dont la taille est inférieure à 20Mo.</p>
                    <a href="administration.php" class="btn-r">Retour</a>
                </div>'; 
        }
        
        //SI LE NOM, LE TYPE OU LE PRIX SEUL SONT VIDES...
        if (($_POST['nom'] == null) || ($_POST['prix_med'] == null) || ($_POST['prix_fam'] == null)) {
            
            //...MESSAGE D'ERREUR
            echo '<h3 class="center top">Vous n\'avez pas rempli tout les champs de texte, retournez en arrière et recommencez.</h3>';
            
        //SINON, SI IL SONT REMPLIS...
        } else {
            
            if(!isset($erreur)){
                //On formate le nom du fichier pour enlever les accents...
                $fichier = strtr($fichier,
                   'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                   'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);

                $req = $bdd->prepare('INSERT INTO pizzas(nom, description, prix_med, prix_fam, image) VALUES(?, ?, ?, ?, ?)');
                $req->execute(array($_POST['nom'], $_POST['description'], $_POST['prix_med'], $_POST['prix_fam'], $fichier)) or die ( print_r($req->errorInfo()));
                
                //SI LA LA CONDITION RENVOIS TRUE, ALORS LA REQUETE A FONCTIONNE
                if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier . $fichier)) {
                    //MESSAGE DE CONFIRMATION
                    echo '
                        <div class="center top">
                            <p class="d">La pizza <b>'.htmlspecialchars($_POST['nom']).'</b> a été enregistré</p>
                            <a href="administration.php" class="btn-b">Retour</a>
                        </div>'; 
                } else {
                    echo "ERREUR 03 :: La requête n'a pas fonctionné";
                }
            }
        }    
    } else {
        echo'
            <div class="center top">
                <p class="d">Vous devez être connecté pour ajouter une pizza.</p>
                <a href="connexion.php" class="btn-b">Connexion</a><a href="index.php" class="btn-r">Accueil</a>
            </div>';
    }
?>

    </body>
</html>
