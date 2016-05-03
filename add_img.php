<?php
include 'connexion.php';
session_start();

function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
    // function patch for respecting alpha work find on http://php.net/manual/fr/function.imagecopymerge.php
    $cut = imagecreatetruecolor($src_w, $src_h);
    imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
    imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
    imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);
}
function random($car) {
    $string = "";
    $chaine = "abcdefghijklmnpqrstuvwxy";
    srand((double)microtime()*1000000);
    for($i=0; $i<$car; $i++) {
        $string .= $chaine[rand()%strlen($chaine)];
    }
    return $string;
}

$img = (isset($_POST["img"])) ? htmlentities($_POST["img"]) : NULL;
$img_filtre = (isset($_POST["img_filtre"])) ? htmlentities($_POST["img_filtre"]) : NULL;
$img = preg_replace('/\s/','+',$img);

list($type, $data) = explode(';', $img);
list(, $data) = explode(',', $data);
$data = base64_decode($data);
file_put_contents('tmp/tmp1.png', $data);

$im = imagecreatefrompng('tmp/tmp1.png');
$alpha = imagecreatefrompng('img/'.$img_filtre);
imagecopymerge_alpha($im, $alpha, 0, 0, 0, 0, imagesx($alpha), imagesy($alpha), 100);
$save = "save/".random(50);
imagepng($im, $save);
imagedestroy($im);

$req = $dbh->prepare('SELECT id FROM utilisateur WHERE login = :login');
$req->execute(array('login' => $_SESSION["login"]));
if ($donnees = $req->fetch()) {
    $id = $donnees["id"];
    $stmt = $dbh->prepare("INSERT INTO image (NOM, ID_UTILISATEUR) VALUES (:img, :id)");
    $stmt->execute(array('img' => $save, 'id' => $id));
}
?>
