<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=CAMAGRU', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "select 1 from UTILISATEUR where identifiant = '".$login."' and password = '".$password;
$reponse = $dbh->query($sql);
while ($donnees = $reponse->fetch())
{
    echo "OK";
}