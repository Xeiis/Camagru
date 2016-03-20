function inscription(callback){
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;
    var password2 = document.getElementById('password2').value;

    if (!password){
        alert("password vide"); //afficher une erreur a l'utilisateur
        return;
    }
    if (!password2){
        alert("password2 vide"); //afficher une erreur a l'utilisateur
        return;
    }
    if (password != password2){
        alert("false : " + password + " et " + password2); //afficher une erreur a l'utilisateur
        return;
    }
    if (!login){
        alert("login vide"); //afficher une erreur a l'utilisateur
        return;
    }
    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function()
    {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0))
            callback(xhr.responseText);
    };

    xhr.open("POST", "ajout_utilisateur.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("login=" + login + "&password=" + password);
}

function login(callback)
{
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;

    if (!password){
        alert("password vide");
        return;
    }
    if (!login){
        alert("login vide"); //afficher une erreur a l'utilisateur
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
        alert("login et password ok");
        //redigiriger vers la page approprie
    }
    else
    {
        alert("login et password incorrect");
    }
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