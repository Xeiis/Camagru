<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=CAMAGRU', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$login = (isset($_POST["login"])) ? htmlentities($_POST["login"]) : NULL;
$password = (isset($_POST["password"])) ? htmlentities($_POST["password"]) : NULL;

$sql = "select 1 from UTILISATEUR where identifiant = '".$login."' and password = '".$password;
$reponse = $dbh->query($sql);
while ($donnees = $reponse->fetch())
{
    echo "OK";
}