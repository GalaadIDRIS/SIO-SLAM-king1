<?php 

    require '_header.php'; 
    require '_menu.php';

    if(!isset($_SESSION['id'])){

?>

        <div class="dawn-grid">
            <div class="g-4">&nbsp</div>
            <div class="g-4">
                <h1 class="b"><br><br>Connexion</h1>
                <form class="dawn-form" method="post" action="verif.php">
                    <input class="i-2 i-r" type="text" name="nom" id="nom" placeholder="Nom"><input class="i-2 i-l" type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                    <br>
                    <input class="btn-b" type="submit" value="Valider">
                </form>
            </div>
            <div class="g-4">&nbsp</div>
        </div>

<?php
        
    } elseif(isset($_SESSION['id'])) {
        header('Location: administration.php');
    }
              
?>

    </body>
</html>