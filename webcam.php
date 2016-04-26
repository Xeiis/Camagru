<?php session_start(); ?>
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
    <div style="padding-left:3%;padding-top:2%;">
       <div class="webcam">
           <button id="stop" onclick="stop()">Stop</button>
           <button id="start" onclick="start()">Start</button>
           <button id="snapshot" onclick="snapshot()">Snapshot</button>
           <div style="padding: 2%;">
               <video id="video" style="float:left;padding-left:2%;" width="640" height="480" autoplay></video>
               <canvas id="canvas" style="padding-left:2%;" width="640" height="480"></canvas>
           </div>
       </div>
        <div id="ladiv">

        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
<script src="js/application.js"></script>
<script src="js/webcam.js"></script>
</body>
</html>
