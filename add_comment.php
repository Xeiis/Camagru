<?php
session_start();
include 'connexion.php';
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : NULL;
$com = (isset($_POST["com"])) ? htmlentities($_POST["com"]) : NULL;

if ($com) {
    echo 'in<br>';
    $sql = $dbh->prepare('SELECT id FROM utilisateur WHERE login = ?');
    $sql->execute(array($_SESSION['login']));
    if ($donnees = $sql->fetch()) {
        $id_uti = $donnees['id'];
        echo $id_uti;
        $req = $dbh->prepare('INSERT INTO commentaire (commentaire,id_utilisateur,id_image) values(:com, :id_uti, :id_img)');
        $req->execute(array('com' => $com, 'id_uti' => $id_uti, 'id_img' => $id));
    }

}
?>