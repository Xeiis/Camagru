<button onclick="start()">Lancer le décompte</button>
<div id="inexistant" class="error" style="display:block;opacity:0;">
    <p>Vous n'avez pas indiquer de login</p>
</div>
<div id="password_error" class="error" style="display:block;opacity:0;">
    <p>Vous n'avez pas indiquer de password</p>
</div>
<div id="bip" class="display"></div>
<script>
    var x = 0;
    var y = 1;
    var intervalId = null;
    var intervalId2 = null;
    var intervalId3 = null;

    function action(intervalId)
    {
        clearInterval(intervalId);
    }
    function bip(elem)
    {
        elem.style.opacity = x;
        x+=0.01;
    }
    function bip2(elem)
    {
        elem.style.opacity = y;
        y -= 0.01;
    }
    function start()
    {
        var elem = document.getElementById("inexistant");
        intervalId = setInterval(function() {bip(elem)}, 25);
        setTimeout(function() {action(intervalId)}, 100 * 25);
        setTimeout(function() {intervalId3 = setInterval(function() {bip2(elem)},25); }, 3000);
        setTimeout(function() {action(intervalId3)}, 100 * 25 + 3000);
        var elem2 = document.getElementById("password_error");
        intervalId2 = setInterval(function() {bip(elem2)}, 25);
        setTimeout(function() {action(intervalId2)}, 100 * 25);
        setTimeout(function() {intervalId4 = setInterval(function() {bip2(elem2)},25); }, 3000);
        setTimeout(function() {action(intervalId4)}, 100 * 25 + 3000);
        x = 0;
        y = 1;
    }
</script>