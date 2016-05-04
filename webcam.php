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
                    <form method="post" action="add_img.php" enctype="multipart/form-data" style="float: right;">
                    <label for="files"> <span class="btn">Télécharger une image</span></label>
                    <input style="visibility: hidden; position: absolute;" id="files" class="form-control" type="file" onclick="img_load()" name="files">
                    <input type="hidden" id="filtre_img" value="" name="img_filtre">
                    <input type="submit" value="Envoyez">
                    </form>
                    <div style="padding: 2%;">
                        <video id="video" style="float:left;padding-left:2%;" width="320" height="240" autoplay></video>
                        <canvas id="canvas" style="padding-left:2%;display:none" width="320" height="240"></canvas>
                        <div id="filtre" style="float:left;padding-left:2%;padding-top:2%;width:76%%;height:auto;display:none">
                            <span>Cliquer sur une image pour la choisir</span>
                            <img src="img/alphatest1.png" width="160" height="120" onclick="image_choose('alphatest1.png')">
                            <img src="img/alphatest2.png" width="160" height="120" onclick="image_choose('alphatest2.png')">
                            <img src="img/alphatest3.png" width="160" height="120" onclick="image_choose('alphatest3.png')">
                            <img src="img/cadre.png" width="160" height="120" onclick="image_choose('cadre.png')">
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
                        <div class="img" onclick="supprimer(<?php echo $donnees['id'] ?>)"><img width="320" height="240"
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
