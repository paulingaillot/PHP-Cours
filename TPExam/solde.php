<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>



<?php

require_once('./controller.php');
if(!isConnected()) {
    header("Location: ./index.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}


$val = view_ident();

$ident = $val['login'];
$solde = $val['solde'];

echo "<br><h2 class='text-center'> Bonjour ".$val['prenom']." </h2>";
echo "<h3 class='text-center'> Voici ton tableau de bord.</h3><br>";
echo "<hr>";
echo "<a href='./view-addmoney.php?id=".$val['login']."'><button type='button' class='btn btn-success'>Ajouter de l'argent au solde</button></a><br><br>";
echo "<a href='./controller.php?func=disconnect'><button type='button' class='btn btn-dark'> Deconnexion</button></a>";
echo "<hr>";
echo "<br>";
echo "<br><table class='table'><tr><th> 👤 Identifiant : ".$ident."</th><th> 💰 Solde : ".$solde."€</th></table>";

$tab = view_modif();
echo "<table class='table'>";
$o=0;
echo "<tr>";
echo "<th scope='col'>N°</th>";
echo "<th scope='col'>Date</th>";
echo "<th scope='col'>Last Value</th>";
echo "<th scope='col'>New Value</th>";
echo "</tr>";
foreach ($tab as $arr) {
    $o++;
    $date = $arr['date'];
    $lastval = $arr["lastval"];
    $newval = $arr["newval"];
    echo "<tr>";
    echo "<td scope='row'>" . $o . "</td>";
    echo "<td>" . $date . "</td>";
    echo "<td>" . $lastval . "</td>";
    echo "<td>" . $newval . "</td>";
    echo "<td><a href='./modify.php?id=" . $ident."&idmodif=".$arr['id']."'><button class='btn btn-warning' type=' button'> Modifier</button></a></td>";
    echo "</tr>";
}
echo "</table>";


?>

</html>