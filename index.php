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
$o=1;
for($o=1; $o<sizeof($files2); $o++) {
foreach ( $files2 as $file){
  if($file == "TP".$o) {
    echo "<a class=\"center-div\" href=\"",$file,"/",$file,"-PHP-GAILLOT.php\"><button class=\" center-div alert btn btn-primary \">";
    echo $file;
    echo " <span class=\"badge badge-light \">".(substr_count(fread(fopen("./".$file."/".$file."-PHP-GAILLOT.php", 'rb'), filesize("./".$file."/".$file."-PHP-GAILLOT.php")), "h2",)/2)." Exos</span>";
    echo "</button></a><br>";
  }
}
}

?>
</div>

</body>

</html>