<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=CAMAGRU', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}




/*$ident = $_GET['ident'];
$mdp = $_GET['mdp'];
$true = 0;
$sql = "select * from UTILISATEUR where identifiant = '".$ident."' and mdp = '".$mdp."'";
$reponse = $dbh->query($sql);
while ($donnees = $reponse->fetch())
{

    echo "UTILISATEUR";
    $true = 1;
}
$sql = "select * from LOCATAIRE where identifiant = '".$ident."' and mdp = '".$mdp."'";
$reponse = $dbh->query($sql);
while ($donnees = $reponse->fetch())
{
    echo "LOCATAIRE";
    $true = 1;
}
if($true == 0)
{
    echo $true;
}*/
/*$ident = $_GET['ident'];
$mdp = $_GET['mdp'];
    if ($ident == 'medecin')
        echo "MEDECIN";
    elseif ($ident == 'pharmacien')
        echo "PHARMACIEN";
    elseif ($ident == 'utilisateur')
        echo "UTILISATEUR";
?>*/