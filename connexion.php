<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=camagru', 'root', 'maison02', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
