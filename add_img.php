<?php
include 'connexion.php';
session_start();

$img = (isset($_POST["img"])) ? htmlentities($_POST["img"]) : NULL;

$req = $dbh->prepare('SELECT id FROM utilisateur WHERE login = :login');
$req->execute(array('login' => $_SESSION["login"]));
if ($donnees = $req->fetch()) {
    $id = $donnees["id"];
}
$img = preg_replace('/\s/','+',$img);
$stmt = $dbh->prepare("INSERT INTO image (NOM, ID_UTILISATEUR) VALUES (:img, :id)");
$stmt->execute(array('img' => $img, 'id' => $id));
?>
