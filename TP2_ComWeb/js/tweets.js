 let login = 'cir2';
 let currentTitle = 'Liste des tweets';
 
 ajaxRequest('GET', 'php/request.php/tweets/', displayTweets);
 $('#all-button').on('click', () =>
 {
   currentTitle = 'Liste des tweets';
   ajaxRequest('GET', 'php/request.php/tweets/', displayTweets);
 });
 $('#my-button').on('click', () =>
 {
   currentTitle = 'Liste de mes tweets';
   ajaxRequest('GET', 'php/request.php/tweets/?login=' + login, displayTweets);
 });
 $('#tweet-add').on('submit', (event) =>
 {
   event.preventDefault();
   ajaxRequest('POST', 'php/request.php/tweets/', () =>
   {
     ajaxRequest('GET', 'php/request.php/tweets/', displayTweets);
   }, 'login=' + login + '&text=' + $('#tweet').val());
   $('#tweet').val('');
 });
 $('#tweets').on('click', '.mod', () =>
 {
   ajaxRequest('PUT', 'php/request.php/tweets/' +
     $(event.target).closest('.mod').attr('value'), () =>
     {
       ajaxRequest('GET', 'php/request.php/tweets/', displayTweets);
     }, 'login=' + login + '&text=' + prompt('Nouveau tweet :'));
 });
 $('#tweets').on('click', '.del', () =>
 {
   ajaxRequest('DELETE', 'php/request.php/tweets/' +
     $(event.target).closest('.del').attr('value') +'?login=' + login, () =>
     {
       ajaxRequest('GET', 'php/request.php/tweets/', displayTweets);
     });
 });
 
 //------------------------------------------------------------------------------
 //--- displayTweets ------------------------------------------------------------
 //------------------------------------------------------------------------------
 // Display tweets.
 // \param tweets The tweets data received via the Ajax request.
 function displayTweets(tweets)
 {
   // Fill tweets.
   $('#tweets').html('<h3>' + currentTitle + '</h3>');
   for (let i = 0; i < tweets.length; i++)
   {
     $('#tweets').append('<div class="card"><div class="card-body">' +
       tweets[i].login + ' : ' + tweets[i].text +
       '<div class="btn-group float-right" role="group">' +
       '<button type="button" class="btn btn-light float-right mod"' +
       ' value="' + tweets[i].id + '"><i class="fa fa-edit"></i></button>' +
       '<button type="button" class="btn btn-light float-right del"' +
       ' value="' + tweets[i].id + '"><i class="fa fa-trash"></i></button>' +
       '<div></div></div>');
   }
 }
 