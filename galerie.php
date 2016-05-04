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
            <div>
                <div id="ladiv2">
                    <center><span style="margin-left:auto;margin-right:auto;">0 - 10</span>
                    <?php
                    include "connexion.php";
                    $req = $dbh->prepare('SELECT img.id,img.nom,img.jaime,img.id_utilisateur,u.login FROM image img LEFT JOIN utilisateur u on img.id_utilisateur = u.id order by img.id desc LIMIT 10');
                    $req->execute();
                    while ($donnees = $req->fetch()) {
                        ?>
                        <div class="img" style="padding:20px;background-color:white;"><img width="320" height="240"
                            src="<?php echo $donnees['nom'] ?>">
                        <div style="background-color:#afafaf;padding:10px;"><span
                                style="margin:5px"><img onclick="add_like(<?php echo $donnees['id']; ?>)" src="img/heart_16.png"> <?php echo $donnees['jaime']; ?> </span>
                            <div><input id="commentaire<?php echo $donnees['id'] ?>" style="width:69%;" type="text"
                                        placeholder="Votre commentaire...">
                                <button onclick="add_comment(<?php echo $donnees['id'] ?>)">Ajouter</button>
                            </div><?php
                            $sql = $dbh->prepare('SELECT com.id,commentaire,jaime,u.login FROM commentaire com LEFT JOIN utilisateur u on com.id_utilisateur = u.id  where id_image = :id_img order by com.id desc');
                            $sql->execute(array('id_img' => $donnees['id']));
                            while ($donnees2 = $sql->fetch()) {
                                ?>
                                <div style="margin:5px">
                                <div><span
                                        style="font-weight: bold;color:#3646ff"><?php echo $donnees2['login'] ?></span><?php echo "  " . $donnees2['commentaire']. " <img onclick=\"add_like_com(".$donnees2['id'].")\" src=\"img/heart_16.png\"> " . $donnees2['jaime']; ?>
                                </div></div><?php
                            }
                            ?></div></div><?php
                    }
                    ?>
                    <button id="prev" onclick="prev()" style="float:left">Prev</button>
                    <button id="next" onclick="next()" style="float:right">Next</button>
                    </center>
                </div>
            </div>
        </div>
        <?php
        include 'footer.php';
        ?>
    </div>
    <script src="js/application.js"></script>
    </body>
    </html>
    <?php
}
else{
    echo "Vous n'avez pas accès a cet page connecter vous d'abord.";
}
?>