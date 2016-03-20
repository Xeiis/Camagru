<?php
include 'connexion.php';

$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;

$sql = "select 1 from UTILISATEUR where login = '".$login."' and password = '".$password."'";
$reponse = $dbh->query($sql);
if ($donnees = $reponse->fetch())
    echo "OK";
