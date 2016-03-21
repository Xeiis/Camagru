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
            <input type="text" id="login" placeholder="Identifiant"><br/>
            <div id="inexistant" class="error" style="display:none">
                <p>Vous n'avez pas indiquer de login</p>
            </div>
            <div id="login_error" class="error" style="display:none">
                <p>Login deja existant</p>
            </div>
            <input type="password" id="password"  placeholder="Mot de passe"><br/>
            <div id="password_error" class="error" style="display:none">
                <p>Vous n'avez pas indiquer de password</p>
            </div>
            <input type="password" id="password2" placeholder="Vérification Mot de passe"><br/>
            <div id="password2_error" class="error" style="display:none">
                <p>Vous n'avez pas indiquer de password de verification</p>
            </div>
            <div id="different" class="error" style="display:none">
                <p>Les deux mots de passe ne correspondent pas.</p>
            </div>
            <input onclick="inscription(readData)" type="submit" value="Inscription">
            <div id="valide" class="valid" style="display:none">
                <p>Bravo, vous etes maintenant inscrit.</p>
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