<?php
    require_once('./controller.php');
    if(!isConnected()) {
        header("Location: ./index.php"); /* Redirection du navigateur */

        /* Assurez-vous que la suite du code ne soit pas exécutée une fois la redirection effectuée. */
        exit;
    }

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<br><h2 class="text-center">Ajout D'argent</h2><hr><br>
<form action="controller.php?func=addmoney" method="post">
<div class="mb-3">
&nbsp;&nbsp;Identifiant : <input type='text' name='nom' value=<?php echo $_GET["id"]; ?> DISABLED><br><br>
&nbsp;&nbsp;Argent a Ajouter : <input type='number' name='add' value=5><br><br>
<?php 

if(isset($_GET['err'])) {
    echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
    echo "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
    if($_GET['err'] == 1) echo "Vous ne pouvez pas vous retirer de l'argent, L'argent doit etre utilisé pour manger !<br>";
    echo '</div>';
}
?>
&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' class="btn btn-success" value='Add Money' >
</div>
</form>


</html>