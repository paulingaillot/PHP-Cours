<html>


<body>

<?php echo "<form action='controller.php?func=update&id=".$_GET['idmodif']."' method='post'>";?>
<div class="mb-3">
&nbsp;&nbsp;Identifiant : <input type='text' name='nom' value=<?php echo $_GET["id"]; ?> DISABLED><br><br>
&nbsp;&nbsp;Argent apres transaction : <input type='number' name='numberpo' value=5><br><br>
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
</body>
</html>