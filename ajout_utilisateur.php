<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=LOYER', 'root', 'root');
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
if(isset ($_POST['identifiant']) )
{
    //echo "ident : ".$_POST['identifiant'];
    $ident = $_POST['identifiant'];
}
else
{
   //echo "pas d'identifiant";
}
if(isset ($_POST['mdp']) )
{
    //echo "mdp : ".$_POST['mdp'];
    $mdp = $_POST['mdp'];
}
else
{
    //echo "pas de mot de passe";
}
$ident = $_GET['identifiant'];
$mdp = $_GET['mdp'];
$table = $_GET['table'];
$sql = "INSERT INTO ".$table." (identifiant, mdp) VALUES ('".$ident."', '".$mdp."')";
$stmt = $dbh->prepare($sql);
$stmt->execute();

echo "Votre compte à bien été crée vous pouvez maintenant vous connectez."
?>
