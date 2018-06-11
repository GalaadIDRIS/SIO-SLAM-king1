<?php

    require '_header.php';

    //ON AFFICHE LE MESSAGE DE CONFIRMATION POUR DIRE AU CLIENT QUE LA COMMANDE A BIEN ÉTÉ ENREGISTRÉE
    echo '
        <div class="container-5">
            <div class="dawn-grid">
                <div class="g-6 center">
                    <p class="d">Votre commande a été enregistré, elle porte le numéros <b>'.htmlspecialchars($_SESSION['client']).'.</b></p>
                    <br>
                    <p class="d">Vous pourrez venir la chercher dans 15 minutes chez King Pizza (45 Court Berria 38000 Grenoble).</p>
                    <br>
                    <form action="cancel.php" method="post">
                        <a href="index.php" class="btn-b">Accueil</a>
                        <input type="hidden" value="'.htmlspecialchars($_SESSION['client']).'" name="id">
                        <input type="submit" value="Annuler la commande" class="btn-r">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>';

    //SUPPRESSION DES VARIABLES DE SESSIONS
    $_SESSION = array();
    session_destroy();

?>