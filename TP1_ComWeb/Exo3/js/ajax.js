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

    document.getElementById("errors").innerHTML = "<i class='fas fa-exclamation-circle'></i> " + errorCode + " : " + message + " putain";
    document.getElementById("errors").style = array("display", "true");
}

function ajaxRequest(type, url, callback) {
    let xhr = new XMLHttpRequest();
    xhr.open(type, url);
    let response = "";
    xhr.onload = () => {

        switch (xhr.status) {
            case 200:
                response = JSON.parse(xhr.responseText);
                console.log(JSON.parse(xhr.responseText));
                callback(response);

                break;
            case 201:
                response = JSON.parse(xhr.responseText);
                console.log(JSON.parse(xhr.responseText));
                callback(response);
                break;
            default:
                httpErrors(xhr.status);
                console.log('HTTP Error: ' + xhr.status)
                break;
        }
    };
    xhr.send();


}

function displayPoll(poll) {
    document.getElementById("poll-title").innerHTML = poll["title"];
    document.getElementById("poll-badge").innerHTML = poll["participants"];
    document.getElementById("poll-option1").innerHTML = poll["option1"];
    document.getElementById("poll-option2").innerHTML = poll["option2"];
    document.getElementById("poll-option3").innerHTML = poll["option3"];
    document.getElementById("progress-option1").innerHTML = Math.round(100*(poll["option1score"]/poll["participants"]),2);
    document.getElementById("progress-option2").innerHTML = Math.round(100*(poll["option2score"]/poll["participants"]),2);
    document.getElementById("progress-option3").innerHTML =Math.round(100*(poll["option3score"]/poll["participants"]),2);
    document.getElementById("progress-option1").style.width = Math.round(100*(poll["option1score"]/poll["participants"]),2)+"%";
    document.getElementById("progress-option1").style.display = "block";
    document.getElementById("progress-option2").style.width = Math.round(100*(poll["option2score"]/poll["participants"]),2)+"%";
    document.getElementById("progress-option2").style.display = "block";
    document.getElementById("progress-option3").style.width = Math.round(100*(poll["option3score"]/poll["participants"]),2)+"%";
    document.getElementById("progress-option3").style.display = "block";
}

function displayPolls(polls) {

    //Event 

    const selectElement = document.getElementById('polls-select');

    selectElement.addEventListener('change', (event) => {
        console.log(` ${event.target.value}`)
        ajaxRequest('GET', "php/request.php/polls/"+`${event.target.value}`, displayPoll)
    });

    for (poll of polls) {
        document.getElementById("polls-select").innerHTML = document.getElementById("polls-select").innerHTML + "<option value='" + poll["id"] + "'>" + poll["title"] + "</option>";
    }

}

ajaxRequest('GET', "php/request.php/polls", displayPolls)



