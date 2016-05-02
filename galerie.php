<?php session_start(); ?>
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
            <div id="ladiv2">
                <?php
                include "connexion.php";
                $req = $dbh->prepare('SELECT img.id,img.nom,img.jaime,img.id_utilisateur,u.login FROM image img LEFT JOIN utilisateur u on img.id_utilisateur = u.id order by img.id desc LIMIT 10');
                $req->execute();
                while ($donnees = $req->fetch()) {
                    ?><div class="img" style="padding:20px;background-color:white;"><img src="<?php echo $donnees['nom']?>"><div style="background-color:#afafaf;padding:10px;"> <span style="margin:5px"><3 <?php echo $donnees['jaime'];?> </span>
                    <div><input id="commentaire<?php echo $donnees['id']?>" style="width:85%;" type="text" placeholder="Votre commentaire..."><button onclick="add_comment(<?php echo $donnees['id']?>)">Ajouter</button></div><?php
                        $sql = $dbh->prepare('SELECT commentaire,jaime,u.login FROM commentaire com LEFT JOIN utilisateur u on com.id_utilisateur = u.id  where id_image = :id_img order by com.id desc');
                        $sql->execute(array('id_img' => $donnees['id']));
                    while ($donnees2 = $sql->fetch()) {
                        ?><div style="margin:5px"><div><span style="font-weight: bold;color:#3646ff"><?php echo $donnees2['login'] ?></span><?php echo "  ".$donnees2['commentaire'] ?></div></div><?php
                    }
                    ?></div></div><?php
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
</body>
</html>