<?php
if(isset($_GET['value'])){
    $var = $_GET['value'];
    $res = ($var-32)*5/9;

    echo "Valeur en degré : ".$res;
}

if(isset($_POST['value'])){
    $var = $_POST['value']; // test
    $res = ($var-32)*5/9;

    echo "Valeur en degré : ".$res;
}

?>