<?php
header ("Content-type: image/png");
$image = imagecreate(1000,250);

$gris = imagecolorallocate($image, 150, 150, 150);
$noir = imagecolorallocate($image, 0, 255, 0);

imagestring($image, 200, 0, 0, "Cours des action Als et For en 2010", $noir);


    // Enable all warnings and errors.
    require_once('./database2.php');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  
    // Database connection.
    $db = dbConnect();

for($i=1; $i<=12; $i++) {
    $mois = getMonth($i);
    for($j=1; $j<=2; $j++) {
        if($j==1) $act = "Als";
        else $act = "For";

        $val = dbGetVal($db, $act, $mois);

        $color= null;
        if($j==1) {
            $color = imagecolorallocate($image, 255, 255, 255);
        }else {
            $color = imagecolorallocate($image, 255, 0, 0);
        }

        if($i>1){
        $mois1 = getMonth($i-1);
        $val1 = dbGetVal($db, $act, $mois1);
        
        imageline ($image , 100*($i-1) , 250-3*$val1[0]['valeur'], 100*$i ,  250-3*$val[0]['valeur'] , $color);
        }
        else {
            imageline ($image , 100*($i-1) , 250-3*$val[0]['valeur'], 100*$i , 250-3*$val[0]['valeur'] , $color);
        }
        
       
        

    }

}

$blanc = imagecolorallocate($image, 255, 255, 255);
$red = imagecolorallocate($image, 255,0,0);
imagestring($image, 5, 100, 200, "Alt", $blanc);
imagestring($image, 5, 50, 200, "For", $red);

imagepng($image);

?>