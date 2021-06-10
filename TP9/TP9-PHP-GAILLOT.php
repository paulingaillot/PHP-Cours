<?php
header ("Content-type: image/png");
$image = imagecreate(1000,250);

$gris = imagecolorallocate($image, 150, 150, 150);
$noir = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 4, 350, 0, "Notes des etudiants E1 et E2", $noir);


    // Enable all warnings and errors.
    require_once('./database.php');

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
  
    // Database connection.
    $db = dbConnect();

for($i=1; $i<=2; $i++) {
    $etu = "E".$i;
    for($j=1; $j<=10; $j++) {
        $sem = "S".$j;
        $val = dbGetNotes($db, $etu, $sem);

        $color= null;
        if($i==1) {
            $color = imagecolorallocate($image, 255, 255, 255);
        }else {
            $color = imagecolorallocate($image, 0, 0, 255);
        }

        if($j>1){
        $sem1 = "S".($j-1);
        $val1 = dbGetNotes($db, $etu, $sem1);
        imageline ($image , 100*($j-1) , 200-10*$val1[0]['note'], 100*$j ,  200-10*$val[0]['note'] , $color);
        }
        else {
            imageline ($image , 100*($j-1) , 200-10*$val[0]['note'], 100*$j , 200-10*$val[0]['note'] , $color);
        }
        
        $blanc = imagecolorallocate($image, 255, 255, 255);
        $bleu = imagecolorallocate($image, 0,0,255);
        imagestring($image, 4, 75, 50, "E1", $blanc);
        imagestring($image, 4, 75, 150, "E2", $bleu);

        imagestring($image, 4, 700, 200, "Moyenne des notes de E1 : ".dbGetMoyenne($db, "E1"), $noir);
        imagestring($image, 4, 700, 230, "Moyenne des notes de E2 : ".dbGetMoyenne($db, "E2"), $noir);
        

    }

}

imagepng($image);

?>