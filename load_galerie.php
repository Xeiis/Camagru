<?php
include "connexion.php";
$limit = (isset($_POST["limit"])) ? htmlentities($_POST["limit"]) : NULL;

$req = $dbh->prepare('SELECT img.id,img.nom,img.jaime,img.id_utilisateur,u.login FROM image img LEFT JOIN utilisateur u on img.id_utilisateur = u.id order by img.id desc LIMIT 0,10');
$req->execute(/*array($limit - 10, $limit)*/);
$rows = array();
$i = 0;
while ($donnees = $req->fetch()) {
    $rows[] = $donnees;
    $sql = $dbh->prepare('SELECT commentaire,jaime,u.login FROM commentaire com LEFT JOIN utilisateur u on com.id_utilisateur = u.id  where id_image = :id_img');
    $sql->execute(array('id_img' => $donnees['id']));
    while ($donnees2 = $sql->fetch()) {
        $rows[$i][] = $donnees2;
    }
    $i++;
}
print json_encode($rows);
?>