<?php
try {
$dbh = new PDO('mysql:host=localhost;dbname=LOYER', 'root', 'root');
}
catch (PDOException $e)
{
print "Erreur !: " . $e->getMessage() . "<br/>";
die();
}
$nom = $_GET['bien'];
$ident = $_GET['ident'];
$sql = "select ID_UTILISATEUR from UTILISATEUR where identifiant = '".$ident."'";
echo "sql : ".$sql;
$reponse = $dbh->query($sql);
$bien = 0;
while ($donnees = $reponse->fetch())
{
    $id = $donnees['ID_UTILISATEUR'];
}
echo "id : ".$id;
$sql = "INSERT INTO BIEN (nom,ID_UTILISATEUR) VALUES ('".$nom."','".$id."')";
echo "sql : ".$sql;
$stmt = $dbh->prepare($sql);
$stmt->execute();
?>