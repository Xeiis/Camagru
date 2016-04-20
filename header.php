<?php session_start(); ?>
<div class="header">
    <table style="float:left">
        <tbody>
        <tr>
            <td id="logo">
                <img src="img/logo.jpg" height="30" width="30">
            </td>
            <td id="home">
                <a href="index.php">Home</a>
            </td>
            <td id="galerie">
                <a href="galerie.php">Galerie</a>
            </td>
            <td id="webcam">
                <a href="webcam.php">Webcam</a>
            </td>
        </tr>
        </tbody>
    </table>
    <?php
        if ($_SESSION["login"])
        {
            ?><div style="float:right;color:white;padding:20px;"><span> Bonjour <?php echo $_SESSION["login"]; ?> </span></div> <?php
        }
    ?>
</div>