let login ='';
while (login == '' ){
  login = prompt("login");
}


let currentTitle = 'Liste des avis';

ajaxRequest('GET', 'php/request.php/avi/?login=' + login, displayAvi);
$('#all-button').on('click', () =>
{
  let login = prompt("login");
  currentTitle = 'Liste des Avis';
  ajaxRequest('GET', 'php/request.php/avi/?login=' + login, displayAvi);
});
$('#my-button').on('click', () =>
{
  let password = prompt("password");
  if(password == "1234") {
  currentTitle = 'Liste de mes tweets';
  ajaxRequest('GET', 'php/request.php/avi/', displayAvi2);
  } else {
    ajaxRequest('GET', 'php/request.php/avi/', displayAvi1);
  }
});
$('#avi-add').on('submit', (event) =>
{
  event.preventDefault();
  ajaxRequest('POST', 'php/request.php/avi/', () =>
  {
    ajaxRequest('GET', 'php/request.php/avi/?login=' + login, displayAvi);
  },  'login='+login+'&note=' + $('#note1').val() + '&text=' + $('#avi1').val());
  $('#avi').val('');
});
$('#avi').on('click', '.mod', () =>
{
  ajaxRequest('PUT', 'php/request.php/avi/' +
    $(event.target).closest('.mod').attr('value'), () =>
    {
      ajaxRequest('GET', 'php/request.php/avi/?login=' + login, displayAvi);
    }, 'text=' + prompt('Nouveau commentaire :') + '&note=' + prompt('Nouvelle note :'));
});
$('#avi').on('click', '.del', () =>
{
  ajaxRequest('DELETE', 'php/request.php/avi/' +
    $(event.target).closest('.del').attr('value'), () =>
    {
      ajaxRequest('GET', 'php/request.php/tweets/?login=' + login, displayAvi);
    });
});

//------------------------------------------------------------------------------
//--- displayTweets ------------------------------------------------------------
//------------------------------------------------------------------------------
// Display tweets.
// \param tweets The tweets data received via the Ajax request.
function displayAvi(avi)
{
  // Fill tweets.
  $('#avi').html('<h3>' + currentTitle + '</h3>');
  for (let i = 0; i < avi.length; i++)
  {
    $('#avi').append('<div class="card"><div class="card-body">' +
    avi[i].note + ' : ' + avi[i].comment +
      '<div class="btn-group float-right" role="group">' +
      '<button type="button" class="btn btn-light float-right mod"' +
      ' value="' + avi[i].id + '"><i class="fa fa-edit"></i></button>' +
      '<button type="button" class="btn btn-light float-right del"' +
      ' value="' + avi[i].id + '"><i class="fa fa-trash"></i></button>' +
      '<div></div></div>');
  }
}

function displayAvi2(avi)
{
  // Fill tweets.
  $('#avi').html('<h3>' + currentTitle + '</h3>');
  for (let i = 0; i < avi.length; i++)
  {
    $('#avi').append('<div class="card"><div class="card-body">' +
    avi[i].note + ' : ' + avi[i].comment +
      '<div class="btn-group float-right" role="group">' +
      '<div></div></div>');
  }
}
