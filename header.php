<?php //session_start(); ?>
<div class="header">
    <table style="float:left">
        <tbody>
        <tr>
            <td id="logo">
                <img src="img/logo.jpg" height="30" width="30">
            </td>
            <?php
            if (!$_SESSION["login"]) {
            ?>
            <td id="home">
                <a href="index.php">Home</a>
            </td>
                <?php
            }
            else {
                ?>
                <td id="galerie">
                    <a href="galerie.php">Galerie</a>
                </td>
                <td id="webcam">
                    <a href="webcam.php">Webcam</a>
                </td>
                <?php
            }
            ?>
        </tr>
        </tbody>
    </table>
    <?php
        if ($_SESSION["login"])
        {
            ?><div style="float:right;color:white;padding:10px;"><span> Bonjour <?php echo $_SESSION["login"]; ?> </span><button onclick="logout()">Deconnexion</button></div> <?php
        }
    ?>
</div>