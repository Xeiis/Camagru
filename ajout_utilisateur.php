<?php
include 'connexion.php';
session_start();
$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$password2 = (isset($_POST["password2"])) ? htmlentities($_POST["password2"]) : NULL;

if($password != $password2)
    echo "different";
else if($password == NULL)
    echo "password";
else if($login == NULL)
    echo "login vide";
else if($password2 == NULL) {
    echo "password2";
}
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
        $stmt = $dbh->prepare("INSERT INTO UTILISATEUR (login, password) VALUES (:login, :passwd)");
        $stmt->execute(array('login' => $login, 'passwd' => $sha1));
        $_SESSION["login"] = $login;
        echo "OK";
    }
}
?>
