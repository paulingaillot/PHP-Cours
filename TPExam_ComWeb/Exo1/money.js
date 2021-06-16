function ajaxRequest(type, url, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(type, url);
    let response ="";
    xhr.onload = () =>  {

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
            document.getElementById("errors").style.display = "block";
        }

        switch (xhr.status) {
            case 200:
                response = xhr.responseText;
                callback(JSON.parse(response));
                console.log(xhr.responseText);
                break;
            case 201:
                response = xhr.responseText;
                callback(JSON.parse(response));
                console.log(xhr.responseText);
                break;
            default:
                httpErrors(xhr.status);
                console.log('HTTP Error: '+xhr.status)
                break;
        }
    };
    xhr.send();
    
    
}

function display($response) {
    let eur = document.getElementById("euro").value;
    let option = document.getElementById("option").value;
    console.log(option);

    document.getElementById("dollar").style.display ="none";
    document.getElementById("Yuan").style.display ="none";
    document.getElementById("dirham").style.display ="none";

   if(option == "Dollars"){
    document.getElementById("dollar").innerHTML = "<input type='text' class='form-control' value='"+(eur * $response["eur"]["usd"])+"' DISABLED>";
    document.getElementById("dollar").style.display ="block";
   } 
   if(option == "Yuan") {
    document.getElementById("Yuan").innerHTML = "<input type='text' class='form-control' value='"+eur * $response["eur"]["cny"]+"'DISABLED>";;
    document.getElementById("Yuan").style.display ="block";
   } 
   if(option == "Dirham") {
    document.getElementById("dirham").innerHTML = "<input type='text' class='form-control' value='"+eur * $response["eur"]["mad"]+"' DISABLED>";;
    document.getElementById("dirham").style.display ="block";
   } 
}

let nut = document.getElementById("convertir");
nut.addEventListener('click', function () {
    ajaxRequest('GET', "https://cdn.jsdelivr.net/gh/fawazahmed0/currency-api@1/latest/currencies/eur.json", display);
});
