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
        <div class="webcam">
            <video id="video"></video>
            <canvas id="canvas"></canvas>
        </div>
    </center>
</div>
<?php
include 'footer.php';
?>
<script src="js/application.js"></script>
<script src="js/webcam.js"></script>
</body>
</html>