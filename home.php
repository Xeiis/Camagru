<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Camagru">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="Damien Christophe">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<?php
    include 'header.php';
?>
    <div class="container">
        <!-- au millieu -->
        <center>
            <div class="connexion">
                <div class="connexion_header">
                    Connectez-vous !
                </div>
                <input type="text" id="login" value="" placeholder="Login"><br>
                <div id="inexistant" class="error" style="display:none;opacity:0;">
                    <p>Vous n'avez pas indiquer de login</p>
                </div>
                <input type="password" id="password" value="" placeholder="Password"><br>
                <div id="password_error" class="error" style="display:none;opacity:0;">
                    <p>Vous n'avez pas indiquer de password</p>
                </div>
                <div id="error" class="error" style="display:none;opacity:0;">
                    <p>Mauvais mot de passe / login, Merci de reesayer.</p>
                </div>
                <input onclick="login(readData)" type="submit" value="Connection"><br>
                <a href="inscription.php" style="font-size:12px; color:#000; text-decoration:none">Je m'inscrit !</a>
            </div>
         </center>
	</div>
<?php
    include 'footer.php';
?>
<script src="js/application.js"></script>
</body>
</html>
