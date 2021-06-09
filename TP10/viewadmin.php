<html>

<h1> Bienvenue a toi inconnue !</h1>
<a href="./view-newetudiant.php"><button class='' type='button'> Ajouter un etudiant</button></a><br><br>
<a href="./controller.php?func=disconnect"><button class='' type='button'> Deconnexion</button></a>

<?php
require_once('./controller.php');
if (!isConnected()) {
    header("Location: ./index.php"); /* Redirection du navigateur */

    /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
    exit;
}



$tab = view_admin();
echo "<table>";
foreach ($tab as $arr) {
    $nom = $arr['nom'];
    $prenom = $arr["prenom"];
    echo "<tr>";
    echo "<td>" . $nom . "</td>";
    echo "<td>" . $arr['prenom'] . "</td>";
    echo "<td>" . $arr['note'] . "</td>";
    echo "<td><a href='./controller.php?func=delete&nom=" . $nom . "&prenom=" . $prenom . "'><button class='' type='button'> Supprimer</button><a href='./view-editetudiant.php?nom=" . $nom . "&prenom=" . $prenom . "'><button class='' type=' button'> Modifier</button></a></a></td>";
    echo "</tr>";
}
echo "</table>";


?>

</html>