function login(callback)
{
    var login = document.getElementById('login').value;
    var password = document.getElementById('password').value;

    alert("login : "+login);
    alert("password : "+password);

    var xhr = getXMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
            callback(xhr.responseText); // recuperation du echo oui ou non
        }
    };

    xhr.open("POST", "connexion.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("login="+login+"&pqssword="+password);
    //ajax pour verifier si le login exist si oui on envoie vers une page on déffinira plus tard.
}

function readData(sData)
{
    if (sData == "OK") {
        alert("login et password ok")
    }
    else
    {
        alert("login et password incorrect");
    }
}

request(readData);

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



