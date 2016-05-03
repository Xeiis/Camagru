<?php session_start();
if ($_SESSION['login']) {
    ?>
    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Camagru">
        <meta name="keywords" content="HTML,CSS,JavaScript">
        <meta name="author" content="Damien Christophe">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>
    <body>
    <div class="global">
        <?php
        include 'header.php';
        ?>
        <div class="container">
            <!-- au millieu -->
            <div style="padding-left:3%;padding-top:2%;">
                <div class="webcam">
                    <button id="stop" onclick="stop()">Stop</button>
                    <button id="start" onclick="start()">Start</button>
                    <button id="snapshot" onclick="snapshot()" style="display:none;">Snapshot</button>
                    <div style="padding: 2%;">
                        <video id="video" style="float:left;padding-left:2%;" width="640" height="480" autoplay></video>
                        <canvas id="canvas" style="padding-left:2%;display:none" width="640" height="480"></canvas>
                        <div id="filtre" style="float:left;padding-left:2%;width:57%;height:480px;display:none">
                            <img src="img/cadre-gif.png" width="160" height="120">
                            <img src="img/cadre2_60.jpg" width="160" height="120">
                            <img src="img/chapeau-sorcier.jpg" width="160" height="120">
                            <img src="img/masque-batman.jpg" width="160" height="120">
                            <img src="img/masque_iron_man.jpg" width="160" height="120"><br/>
                            <button>Choose me</button>
                            <button>Choose me</button>
                            <button>Choose me</button>
                            <button>Choose me</button>
                            <button>Choose me</button>
                        </div>
                    </div>
                </div>

                <div id="ladiv">
                    <?php
                    include "connexion.php";
                    $req = $dbh->prepare('SELECT id,nom FROM image where id_utilisateur = (select id from utilisateur where login = :login) order by id desc');
                    $req->execute(array('login' => $_SESSION['login']));
                    while ($donnees = $req->fetch()) {
                        ?>
                        <div class="img" onclick="supprimer(<?php echo $donnees['id'] ?>)"><img
                            id="<?php echo $donnees['id'] ?>" src="<?php echo $donnees['nom'] ?>">
                        <div class="hover"></div></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
    <script src="js/application.js"></script>
    <script src="js/webcam.js"></script>
    </body>
    </html>
    <?php
}
else{
    echo "Vous n'avez pas accès a cet page connecter vous d'abord.";
}
?>
