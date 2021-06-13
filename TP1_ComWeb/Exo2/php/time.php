<?php

$date = getdate();
$mess = ("il est : ".$date["hours"].":".$date["minutes"].":".$date["seconds"]);
$tab = array($mess, array("hours" => $date["hours"], "minutes" => $date["minutes"], "seconds" =>$date["seconds"]));
$json = json_encode($tab);
print_r($json);
?>