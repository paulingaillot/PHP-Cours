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
          <a class="nav-link " aria-current="page" href="./citations.php">Information</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./recherche.php">Recherche</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./modification.php">Modification</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<h1>Recherche d'une citation</h1>
<hr>
<form method="get">

<label for="exampleFormControlSelect1">Auteur</label>
    <select name="auteur[]" class="form-control" id="exampleFormControlSelect1">
  <?php 
    
    require_once('./php/database.php');

    // Enable all warnings and errors.
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  
    // Database connection.
    $db = dbConnect();

    $var = dbGetAuthorsNames($db);

    foreach($var as $v) {
      echo "<option value=".'"'.$v['nom'].'"'.">";
      echo $v['nom'];
  }

    ?>
  </select>

<label for="exampleFormControlSelect1">Auteur</label>
    <select name="century[]" class="form-control" id="exampleFormControlSelect1">

  <?php 

    $var = dbGetCenturies($db);

    foreach($var as $v) {
      echo "<option value=".'"'.$v['numero'].'"'.">";
      echo $v['numero'];
  }
    ?>

  </ul>
</div>
    </select>
<button type='submit'  class="btn btn-primary">Submit</button>
</form>

<?php

if(isset($_GET['century']) && isset($_GET['auteur'])){

  echo "<h3>Citations</h3>";
  $tab = getQuotesByAuthor($db, $_GET['auteur'][0], $_GET['century'][0]);

  echo "<table class='table'>";
  echo "<thead>";
  echo "<tr>";
  echo"<th scope='col'>Citation</th>";
  echo"<th scope='col'>Auteur</th>";
  echo"<th scope='col'>Siecle</th>";
  echo"</tr>";
  echo"</thead>";
  echo"<tbody>";
  foreach($tab as $t) {
    echo "<tr>";
    echo  "<td scope='col'>".$t['phrase']."</td>";
    echo  "<td scope='col'>".$_GET['auteur'][0]."</td>";
    echo  "<td scope='col'>".$_GET['century'][0]."</td>";
    echo "</tr>";
  }
  echo"</tbody>";
echo"</table>";



}

?>


</body>

</html>