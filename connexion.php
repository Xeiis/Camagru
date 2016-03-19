<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'maison02', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;

$sql = "select 1 from UTILISATEUR where login = '".$login."' and password = '".$password."'";
$reponse = $dbh->query($sql);
if ($donnees = $reponse->fetch())
{
    echo "OK";
}
?>
