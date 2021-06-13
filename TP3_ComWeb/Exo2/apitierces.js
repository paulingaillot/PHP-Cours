/**
 * @Author: Ayoub KARINE
 * @Company: ISEN Yncréa Ouest
 * @Email: ayoub.karine@isen-ouest.yncrea.fr
 * @Created Date: 21-Apr-2021 - 14:31:15
 * @Last Modified: 21-Apr-2021 - 20:02:21
 */
// ----------------- utils -------------------
function showhide(id) {
  let e = document.getElementById(id);
  let eClasses = e.classList;
  eClasses.toggle('d-none');
}
// ----------------- Gihub API -------------------
const github = document.getElementById("github");
github.addEventListener('click', showGithub);
function showGithub() {
  showhide("githuarea");
  showhide("catarea");
}
const githubsearch = document.getElementById("respgithub");
githubsearch.addEventListener('click', function() {

  let user = document.getElementById("githubname").value;
  let url = "https://api.github.com/users/"+user;

  var xhr = new XMLHttpRequest(); 
  xhr.open('GET', url);
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4) {
      let mess="";
      let tab = JSON.parse(xhr.responseText);
      mess = mess +" Username : "+tab["login"];
      mess = mess +"<br> <img src='"+tab["avatar_url"]+"'>";
      mess = mess +"<br> Repositories public : "+tab["public_repos"];
      mess = mess +"<br> Date de creation : "+tab["created_at"];
      mess = mess +"<br> Derniere Connexion : "+tab["created_at"];
      document.getElementById("githubinfo").innerHTML = mess;
    }
  };
  xhr.send();

});

// To do
// ----------------- Cat API -------------------
const cat = document.getElementById("cat");
cat.addEventListener('click', showCat);
function showCat() {
  showhide("catarea");
  showhide("githuarea");
}

const searchcat = document.getElementById("respcat");
searchcat.addEventListener('click', function() {
  const date = new Date();  
  date.getTime();
  let text = document.getElementById("texteinimage").value;
  if(text=="") text= "CIR2";
  document.getElementById("catimg").innerHTML = "<img width=200px src='https://cataas.com//cat/says/"+text+"?size=40/?ts="+date.getMilliseconds()+"'>";

});
// To do