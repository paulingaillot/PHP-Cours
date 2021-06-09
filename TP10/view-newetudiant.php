<html>

<?php
    require_once('./controller.php');
    if(!isConnected()) {
        header("Location: ./index.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }
?>

<form action="controller.php?func=createetu" method="post">


Nom : <input type='text' name='nom' value=""><br><br>
Prenom : <input type='text' name='prenom' value=""><br><br>
<br><br>
Note : <input type='number' name='note' value=""><br><br>

<input type='submit' value='Create Student' >
</form>


</html>