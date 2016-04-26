<?php
include 'connexion.php';
$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$password2 = (isset($_POST["password2"])) ? htmlentities($_POST["password2"]) : NULL;
$email = (isset($_POST["email"])) ? htmlentities($_POST["email"]) : NULL;

if($password != $password2)
    echo "different";
else if($password == NULL)
    echo "password";
else if($login == NULL)
    echo "login vide";
else if($password2 == NULL)
    echo "password2";
else if($email == NULL)
    echo "email";
else
{
    $req = $dbh->prepare('SELECT 1 FROM UTILISATEUR WHERE login = :login');
    $req->execute(array('login' => $login));
    if ($donnees = $req->fetch()) {
        echo "login";
    }
    else {
        $grain = 'b54sFmjJ52';
        $sel = 'a12Gfd51gzR';
        $sha1 = sha1($grain.$password.$sel);
        $stmt = $dbh->prepare("INSERT INTO UTILISATEUR (login, password, email) VALUES (:login, :passwd, :email)");
        $stmt->execute(array('login' => $login, 'passwd' => $sha1, 'email' => $email));
        echo "OK";
        envoie_mail($email, $login, $sha1);
    }
}

function envoie_mail($mail, $login, $sha1)
{
    if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail))
        $passage_ligne = "\r\n";
    else
        $passage_ligne = "\n";
    $message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
    $message_html = "<html><head></head><body><b>Bonjour</b><br/>Vous venez de vous inscrire sur le site web Camagru ! <br/>Pour valider cet exploit veuillez valider votre compte en cliquant sur ce lien <a href='http://localhost:8080/github_camagru/validation.php?login=".$login."&key=".$sha1."'>ci</a></body></html>";
    $boundary = "-----=".md5(rand());
    $sujet = "Validation du compte Camagru";
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
