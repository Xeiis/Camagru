<?php
include 'connexion.php';

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
    $sql = "SELECT 1 FROM UTILISATEUR WHERE login = '" . $login . "'";
    $reponse = $dbh->query($sql);
    if ($donnees = $reponse->fetch())
        echo "login";
    else {
        $grain = 'b54sFmjJ52';
        $sel = 'a12Gfd51gzR';
        $sha1 = sha1($grain.$password.$sel);
        $sql = "INSERT INTO UTILISATEUR (login, password) VALUES ('" . $login . "', '" . $sha1 . "')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        echo "OK";
    }
}
?>
