<?php
include 'connexion.php';

$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;

$grain = 'b54sFmjJ52';
$sel = 'a12Gfd51gzR';
$sha1 = sha1($grain.$password.$sel);

$sql = "select 1 from UTILISATEUR where login = '".$login."' and password = '".$sha1."'";
$reponse = $dbh->query($sql);
if ($donnees = $reponse->fetch())
    echo "OK";
