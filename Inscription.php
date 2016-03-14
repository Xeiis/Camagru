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
            Inscription
        </div>
            <input type="text" class="input-sm form-control" id="identifiant" name="identifiant" placeholder="Identifiant"><br/>
            <input type="password" class="input-sm form-control" id="motdepasse" name="mdp" placeholder="Mot de passe"><br/>
            <input type="password" class="input-sm form-control" id="motdepasse2" placeholder="Vérification Mot de passe"><br/>
            <input onclick="inscription()" type="submit" value="Inscription">
        </div>
        </center>
    </div>
<?php
    include 'footer.php';
?>
<script src="js/application.js"></script>
</body>
</html>