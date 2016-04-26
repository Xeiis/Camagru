<?php
include 'connexion.php';
$logmail = (isset($_POST["logmail"])) ? htmlentities($_POST["logmail"]) : NULL;

$req = $dbh->prepare('SELECT email,password FROM UTILISATEUR WHERE login = :login OR email = :email');
$req->execute(array('login' => $logmail, 'email' => $logmail));
if ($donnees = $req->fetch()) {
    $email = $donnees['email'];
    envoie_mail($email, $logmail, $donnees['password']);
    echo "ok";
}
else
    echo "fail";

function envoie_mail($mail, $logmail, $key)
{
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
        $passage_ligne = "\r\n";
    else
        $passage_ligne = "\n";
    $message_html = "<html><head></head><body><b>Bonjour</b><br/>Vous venez de demander une réinitialisation de mot de passe <br/>Pour réinitialié votre mot passe suivez le lien suivant <a href='http://localhost:8080/github_camagru/modif.php?logmail=".$logmail."&key=".$key."'>ici</a></body></html>";
    $boundary = "-----=".md5(rand());
    $sujet = "Modification de mot de passe";
    $header = "From: \"Camagru\"<camagru@yopmail.fr>".$passage_ligne;
    $header.= "Reply-to: \"Camagru\" <camagru@yopmail.fr>".$passage_ligne;
    $header.= "MIME-Version: 1.0".$passage_ligne;
    $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
    $message = $passage_ligne."--".$boundary.$passage_ligne;
    $message.= "Content-Type: text/html; charset=\"UTF-8\"".$passage_ligne;
    $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
    $message.= $passage_ligne.$message_html.$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
    mail($mail,$sujet,$message,$header);
}
?>