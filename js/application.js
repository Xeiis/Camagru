var x = 0;
var y = 1;
var intervalId = null;
var intervalId2 = null;
var intervalId3 = null;
var intervalId4 = null;

function stop(t){
    clearInterval(t);
}
function moreVisible(elem)
{
    x += 0.01;
    elem.style.opacity = x;
}

function lessVisible(elem)
{
    y -= 0.01;
    elem.style.opacity = y;
}

function inscription(callback){
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;
    var ok;
    var xhr = getXMLHttpRequest();

    if (!password){
        document.getElementById("password_error").style.display = "block";
        setTimeout(function() { display_none("password_error"); }, 3000);
        ok = 1;
    }
    if (!password2){
        document.getElementById("password2_error").style.display = "block";
        setTimeout(function() { display_none("password2_error"); }, 3000);
        ok = 1;
    }
    if (password != password2){
        document.getElementById("different").style.display = "block";
        setTimeout(function() { display_none("different_error"); }, 3000);
        ok = 1;
    }
    if (!login){
        document.getElementById("inexistant").style.display = "block";
        setTimeout(function() { display_none("inexistant"); }, 3000);
        ok = 1;
    }
    if (ok == 1)
        return;

    xhr.onreadystatechange = function()
    {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
            callback(xhr.responseText);
    };

    xhr.open("POST", "ajout_utilisateur.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("login=" + login + "&password=" + password + "&password2=" + password2);
}

function login(callback)
{
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var ok;

    if (!password){
        document.getElementById("password_error").style.display = "block";
        elem = document.getElementById("password_error");
        intervalId = setInterval(function() {moreVisible(elem)},25);
        setTimeout(function() {stop(intervalId)}, 100 * 25);
        setTimeout(function() {intervalId2 = setInterval(function() {lessVisible(elem)},25); }, 3000);
        setTimeout(function() {stop(intervalId2)}, 100 * 25 + 3000);
        setTimeout(function() { display_none("password_error"); }, 100 * 25 + 2000);
        ok = 1;
    }
    if (!login){
        elem2 = document.getElementById("inexistant");
        elem2.style.display = "block";
        intervalId3 = setInterval(function() {moreVisible(elem2)},25);
        setTimeout(function() {stop(intervalId3)}, 100 * 25);
        setTimeout(function() {intervalId4 = setInterval(function() {lessVisible(elem2)},25); }, 3000);
        setTimeout(function() {stop(intervalId4)}, 100 * 25 + 3000);
        setTimeout(function() { display_none("inexistant"); }, 100 * 25 + 2000);
        ok = 1;
    }

    if (ok == 1) {
        x = 0;
        y = 1;
        return;
    }
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText);
        }
    };

    xhr.open("POST", "user_connexion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("login=" + login + "&password=" + password);
}

function readData(sData)
{
    if (sData == "OK") {
        if(NomDuFichier == "home.php")
            document.location.href="galerie.php";
        if(NomDuFichier == "inscription.php") {
            document.getElementById("valide").style.display = "block";
            setTimeout(function () {
                display_none("valide");
            }, 3000);
        }
    }
    else {
        if (NomDuFichier == "inscription.php") {
            if (sData == "different") {
                document.getElementById("different").style.display = "block";
                setTimeout(function() { display_none("different"); }, 3000);
            }
            if (sData == "password") {
                document.getElementById("password_error").style.display = "block";
                setTimeout(function() { display_none("password_error"); }, 3000);
            }
            if (sData == "password2") {
                document.getElementById("password2_error").style.display = "block";
                setTimeout(function() { display_none("password2_error"); }, 3000);
            }
            if (sData == "login vide") {
                document.getElementById("inexistant").style.display = "block";
                setTimeout(function() { display_none("inexistant"); }, 3000);
            }
            if (sData == "login"){
                document.getElementById("login_error").style.display = "block";
                setTimeout(function() { display_none("login_error"); }, 3000);
            }
        }
        if (NomDuFichier == "home.php") {
            document.getElementById("error").style.display = "block";
            setTimeout(function() { display_none("error"); }, 3000);
        }
    }
}

function display_none(id) {
    document.getElementById(id).style.display = "none";
}

function getXMLHttpRequest() {
    var xhr = null;

    if(window.XMLHttpRequest || window.ActiveXObject){
        if(window.ActiveXObject){
            try{
                xhr = new ActiveXObject("Msxml2.XMLHTTP");
            }catch(e){
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        }else{
            xhr = new XMLHttpRequest();
        }
    }else{
        alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
        return;
    }
    return xhr;
}

var CheminComplet = document.location.href;
var NomDuFichier = CheminComplet.substring(CheminComplet.lastIndexOf( "/" )+1 );
if (NomDuFichier == "home.php")
    document.getElementById('home').classList.add('active');
else if (NomDuFichier == "galerie.php")
    document.getElementById('galerie').classList.add('active');
else if (NomDuFichier == "webcam.php")
    document.getElementById('webcam').classList.add('active');
else
    document.getElementById('logo').classList.add('active');