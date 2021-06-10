<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./citations.php">Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./recherche.php">Recherche</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./modification.php">Modification</a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <h1> Ajout</h1>

  <form method="get">

    <p>Nom de L'auteur</p>
    <input type='text' name='nom' value=''>

    <p>Nom de L'auteur</p>
    <input type='text' name='nom' value=''>
    <p>Prenom de l'auteur</p>
    <input type='text' name='prenom' value=''>
    <p>Siecle</p>
    <input type='text' name='siecle' value=''>
    <p>Citation</p>
    <input type='text' name='citation' value=''>

    <button type='submit' class="btn btn-primary">Submit</button>
  </form>

  <?php

  if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['siecle']) && isset($_GET['citation'])) {

    require_once('./php/database.php');

    // Enable all warnings and errors.
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    // Database connection.
    $db = dbConnect();


    $var = dbInsertQuote($db, $_GET['nom'], $_GET['prenom'], $_GET['siecle'], $_GET['citation']);
  }

  ?>

  <h1> Suppression</h1>
  <form method="get">
  <label for="exampleFormControlSelect1">Quote</label>
  <select name="quote" class="form-control" id="exampleFormControlSelect1">
    <?php
    require_once('./php/database.php');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $db = dbConnect();

    $var = dbGetQuotes($db);
    foreach ($var as $v) {
      echo "<option value=" . '"' . $v['id'] . '"' . ">";
      echo $v['id'];
    }



    ?>
  </select>
  <button type='submit' class="btn btn-primary">Submit</button>
  </form>

<?php

if (isset($_GET['quote'])) {

  require_once('./php/database.php');

  // Enable all warnings and errors.
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  // Database connection.
  $db = dbConnect();


  $var = dbDelQuote($db, $_GET['quote']);
  echo $var."<br>";
  print_r($var);
}

?>

</body>

</html>