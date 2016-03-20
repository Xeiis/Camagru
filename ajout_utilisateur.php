<?php
include 'connexion.php';

$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;
$password2 = (isset($_POST["password2"])) ? htmlentities($_POST["password2"]) : NULL;

if ($password != $password2 || $password == NULL || $login == NULL || $password2 == NULL)
    echo "ta essayer de baiser mon javascript ?";
else
{
    $sql = "SELECT 1 FROM UTILISATEUR WHERE login = '" . $login . "'";
    if ($donnees = $reponse->fetch())
        echo "Ce nom d'utilisateur existe deja";
    else {
        $sql = "INSERT INTO UILISATEUR (login, password) VALUES ('" . $login . "', '" . $password . "')";
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        echo "KO";
    }
}
?>
