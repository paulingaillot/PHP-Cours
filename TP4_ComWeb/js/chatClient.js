
var websocket;
var login = window.prompt("Login");
createWebSocket();


function createWebSocket() {
    websocket = new WebSocket("ws://localhost:12345");


    const githubsearch = document.getElementById("sendbut");
    githubsearch.addEventListener('click', function (event) {
        sendMessage(event);

    });

    websocket.onmessage = function() {
        document.getElementById("chat-room").innerHTML =  document.getElementById("chat-room").innerHTML+"\n"+event.data;
        console.log('Message reçu : ' +   websocket.data);
      }
    

}

function sendMessage(event) {
    event.preventDefault();
    let message1  = document.getElementById("chat-message").value;
    websocket.send(login+":"+message1);
    document.getElementById("chat-message").value = "";
}