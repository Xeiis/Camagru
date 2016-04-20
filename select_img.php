<?php
include 'connexion.php';
session_start();

$req = $dbh->prepare('SELECT nom FROM image');
$req->execute();
while ($donnees = $req->fetch()) {
    echo "<img src=\"".$donnees["nom"]."\">";
}
?>
