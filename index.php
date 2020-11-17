<html>
<header>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</header>
<body>
<br>
<h2 >TPS PHP 2020/2021</h2>

<div class="center-div">
<?php
$files2 = scandir("./");

foreach ( $files2 as $file){
  
  if(strpos($file, "TP") !== false) {
    echo "<a class=\"center-div\" href=\"",$file,"/",$file,"-PHP-GAILLOT.php\"><button class=\" center-div alert btn btn-primary \">";
    echo $file;
    echo "</button></a><br />";
  }

}

?>
</div>

</body>

</html>