<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Camagru">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta name="author" content="Damien Christophe">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="header">
        <table>
            <tbody>
            <tr>
                <td>
                    <img src="img/logo.jpg" height="30" width="30">
                </td>
                <td class="active">
                    Home
                </td>
                <td>
                    Galerie
                </td>
                <td>
                    Webcam
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <!-- au millieu -->
        <center>

            <div class="connexion">
                <div class="connexion_header">
                    Connectez-vous !
                </div>
                <input type="text" id="login" value="" placeholder="Login"><br>
                <input type="password" id="password" value="" placeholder="Password"><br>
                <input onclick="login()" type="submit"><br>
                <a href="inscription.php" style="font-size:12px; color:#000; text-decoration:none">Je m'inscrit !</a>
            </div>
         </center>
    </div>
    <div class="footer">
    </div>
    <script src="js/application.js"></script>
</body>
</html>