<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="description" content="Camagru">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="Damien Christophe">
    <link href="css/styles.css" rel="stylesheet">
    <style type="text/css">
    </style>
</head>

<body>
<?php
include 'header.php';
?>
<div class="container">
    <center>
        <div class="connexion">
            <div class="connexion_header">
                Recupération de mot de passe
            </div>
            <input type="text" id="login" placeholder="Identifiant ou Email"><br/>
            <input onclick="forgot()" type="submit" value="Récupération">
            <div id="valide" class="valid" style="display:none;">
                <p>Un e-mail viens de vous être envoyez pour réinitialiser votre mot de passe.</p>
            </div>
            <div id="fail" class="error" style="display:none;">
                <p>Nous n'avons pas pu trouver de compte associé</p>
            </div>
        </div>
    </center>
</div>
<?php
include 'footer.php';
?>
<script src="js/application.js"></script>
</body>
</html>