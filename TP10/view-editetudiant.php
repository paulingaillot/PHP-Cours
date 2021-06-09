<html>

<?php

    require_once('./controller.php');
    if(!isConnected()) {
        header("Location: ./index.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }

echo "<form action='controller.php?func=modifyetu&nom=".$_GET["nom"]."&prenom=".$_GET["prenom"]."' method='post'>";
?>

Nom : <input type='text' name='nom' value=<?php echo $_GET["nom"]; ?> DISABLED><br><br>
Prenom : <input type='text' name='prenom' value=<?php echo $_GET["prenom"]; ?> DISABLED><br><br>
<br><br>
Note : <input type='number' name='note' value=""><br><br>

<input type='submit' value='Edit Student' >
</form>


</html>