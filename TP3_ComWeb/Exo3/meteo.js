
const githubsearch = document.getElementById("meteovalid");
githubsearch.addEventListener('click', function () {

    let city = document.getElementById("city").value;
    let apikey = "68ccf50c42e3458dfe1f958d1f858bbc";
    if (city == "") user = "Paris";

    let url = "https://api.openweathermap.org/data/2.5/weather?q=" + city + "&appid=" + apikey;

    var xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            let mess = "";
            console.log(JSON.parse(xhr.responseText));
            let tab = JSON.parse(xhr.responseText);
            mess = mess + " <tr>Id : " + tab["id"] + "</tr>";
            mess = mess + "<tr> Ville :" + tab["name"] + "</tr>";
            mess = mess + "<tr> Pays : " + tab["sys"]["country"] + "</tr>";
            mess = mess + "<tr> Humidite : " + tab["main"]["humidity"] + "%</tr>";
            mess = mess + "<tr> Temp Mini : " + Math.round(tab["main"]["temp_min"] - 273.15, 2) + " degres</tr>";
            let temp_max = (tab["main"]["temp_max"] - 273.15);
            mess = mess + "<tr> Temp Max : " + Math.round(temp_max, 2) + " degres</tr>";
            document.getElementById("infos").innerHTML = mess;
        }
    };
    xhr.send();

    //Photos

    let api_key="22063918-27af56f49f7d2f480c5b71b31";

    url = "https://pixabay.com/api/?key="+api_key+"&q="+city;

    var xhr2 = new XMLHttpRequest();
    xhr2.open('GET', url);
    xhr2.onreadystatechange = function () {
        let mess = "";
        console.log(JSON.parse(xhr2.responseText));
        let tab = JSON.parse(xhr2.responseText);
        let max= 6;
        for(let i=0; i<max; i++) {
           if(tab["hits"][i]["type"] == "photo")  {
                mess = mess + "<p>"+tab["hits"][i]["tags"]+"</p>";
                mess = mess + "<img width=100px src='"+tab["hits"][i]["largeImageURL"]+"'>";
           }
           else max ++;
        }
        document.getElementById("photos").innerHTML = mess;
    };
    xhr2.send();

});
