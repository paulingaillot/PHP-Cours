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
          <a class="nav-link" href="./modification.php">Modification</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<h1> La citation du jour </h1> 
            <hr>
            <?php
                  require_once('./php/database.php');

                  // Enable all warnings and errors.
                  ini_set('display_errors', 1);
                  error_reporting(E_ALL);
                
                  // Database connection.
                  $db = dbConnect();
            ?>
            <p> Il y'a 
           <?php
                // Number of Quotes
                $nbQuotes = getNumberofQuotes($db);
                echo "<b> $nbQuotes </b>";
            ?>
            citations répértoriées </p>

            <?php
                echo alea($db);
            ?>


</body>

</html>