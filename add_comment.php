<?php
session_start();
include 'connexion.php';
$id = (isset($_POST["id"])) ? htmlentities($_POST["id"]) : NULL;
$com = (isset($_POST["com"])) ? htmlentities($_POST["com"]) : NULL;

if ($com) {
    $sql = $dbh->prepare('SELECT id FROM utilisateur WHERE login = ?');
    $sql->execute(array($_SESSION['login']));
    if ($donnees = $sql->fetch()) {
        $id_uti = $donnees['id'];
        $req = $dbh->prepare('INSERT INTO commentaire (commentaire,id_utilisateur,id_image) values(:com, :id_uti, :id_img)');
        $req->execute(array('com' => $com, 'id_uti' => $id_uti, 'id_img' => $id));
        $sql = $dbh->prepare('SELECT email FROM utilisateur WHERE id = (select id_utilisateur from image where id = ?)');
        $sql->execute(array($id));
        if ($donnees = $sql->fetch()) {
            envoie_mail($donnees['email']);
        }
    }
}

function envoie_mail($mail)
{
    echo $mail;
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
        $passage_ligne = "\r\n";
    else
        $passage_ligne = "\n";
    $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
    $message_html = "<html><head></head><body><b>Bonjour</b><br/>Vous venez de vous recevoir un commentaire sur votre photo. (Bonne chance pour trouver laqu'elle)</body></html>";
    $boundary = "-----=".md5(rand());
    $sujet = "Un nouveaux commentaire sur votre photo !";
    $header = "From: \"Camagru\"<camagru@yopmail.fr>".$passage_ligne;
    $header.= "Reply-to: \"Camagru\" <camagru@yopmail.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: text/plain; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_txt.$passage_ligne;
    $message.= $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    mail($mail,$sujet,$message,$header);
}
?>