
function lat() {
    
    if ("geolocation" in navigator) {
        /* la géolocalisation est disponible */
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById("lat").innerHTML = position.coords.latitude;
          });
      } else {
        document.getElementById("lat").innerHTML = "Impossible de vous localiser";
        /* la géolocalisation n'est pas disponible */
      }

}

function long() {
    
    if ("geolocation" in navigator) {
        /* la géolocalisation est disponible */
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById("long").innerHTML = position.coords.longitude;
          });
      } else {
        document.getElementById("long").innerHTML = "Impossible de vous localiser";
        /* la géolocalisation n'est pas disponible */
      }

}

function reculerPages(){
  window.history.go(-parseInt(document.getElementById('nbpages').value));
}

function clip() {
    let text = document.getElementById("textecopie").value;
    navigator.clipboard.writeText(text);
}

function paste() {
      navigator.clipboard.readText().then(clipText =>
        document.getElementById("textecolle").value = clipText);

}
