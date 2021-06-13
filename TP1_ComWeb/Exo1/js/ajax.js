function httpErrors(errorCode) {
    let message = "";
    switch (errorCode) {
        case 400:
            message = "'Requête Incorecte'";
            break;
        case 401:
            message = "'Authentifiez vous'";
            break;
            case 403:
                message = "'Accès refusé'";
            break;
            case 404:
                message = "'Page non trouvé'";
            break;
            case 500:
                message = "'Erreur interne du serveur'";
            break;
            case 500:
                message = "'Service indisponible'";
            break;
        default:
            message = "'Erreur incconue'";
            break;
    }

    document.getElementById("errors").innerHTML = "<i class='fas fa-exclamation-circle'></i> "+errorCode+" : "+message+"";
    document.getElementById("errors").style = array("display" , "true");
}

function ajaxRequest(type, url, callback, callbackerror) {
    let xhr = new XMLHttpRequest();
    xhr.open(type, url);
    let response ="";
    xhr.onload = () =>  {

        switch (xhr.status) {
            case 200:
                response = xhr.responseText;
                callback(response);
                console.log(xhr.responseText);
                break;
            case 201:
                response = xhr.responseText;
                callback(response);
                console.log(xhr.responseText);
                break;
            default:
                callbackerror(xhr.status);
                console.log('HTTP Error: '+xhr.status)
                break;
        }
    };
    xhr.send();
    
    
}



function displayTimestamp(response) {
    document.getElementById("timestamp").innerHTML = "<i class='fas fa-clock'></i> "+response;
}

    setInterval(() => {
        ajaxRequest('GET', "php/timstamp.php", displayTimestamp, httpErrors)  
    }, 1000);


