<html>

<h1> TP 5</h1>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>

<a href="?temperature=10">Cliquez sur ce lien pour avoir la valeur en degré </a>

<h3>Question 2</h3>

<?php

    if(isset($_GET['temperature'])){

        $res = ($_GET['temperature']-32)*5/9;
      echo "<br> Temperature : ".$res;
    }


?>

<h3>Question 3a</h3>

<form action="convert.php" method="post">

    Valeur en Fahrenheit : <input type="text" name="value" value="">
    <input type="submit" name="send" value="convertir">
</form>

<h3>Question 3b</h3>

<form action="convert.php" method="get">

    Valeur en Fahrenheit : <input type="text" name="value" value="">
    <input type="submit" name="send" value="convertir" href="./convert.php">
</form>

<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>

<form method="get">

<?php

    if(isset($_GET['nom']) && isset($_GET['prenom'])&&  isset($_GET['level']) ){

    echo "Nom : <input type='text' name='nom' value=".$_GET['nom'].">";
    echo "Prenom : <input type='text' name='prenom' value=". $_GET['prenom'].">";
    echo "<br>";
    if($_GET['level'] == "debutant") echo "debutant :<input type='radio' name='level' value='debutant' checked>";
    else echo "debutant :<input type='radio' name='level' value='debutant' >";
    if($_GET['level'] == "avancé") echo "avancé :<input type='radio' name='level' value='avancé' checked>";
    else echo "avancé :<input type='radio' name='level' value='avancé' >";
    echo "<br>";
    echo "<input type='submit' name='effacer' value='Effacer' >";
    echo "<input type='submit' value='Envoyer' >";

     echo "Bonjour ".$_GET['prenom']." ".$_GET['nom'].". Vous avez un niveau ".$_GET['level'];
    }else {

        echo "Nom : <input type='text' name='nom' value=''>";
        echo "Prenom : <input type='text' name='prenom' value=''>";
        echo "<br>";
        echo "debutant :<input type='radio' name='level' value='debutant'>";
        echo "avancé :<input type='radio' name='level' value='avancé'>";
        echo "<br>";
        echo "<input type='submit' name='effacer' value='Effacer' >";
        echo "<input type='submit' value='Envoyer' >";

    }


?>
</form>

<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>

<form method="get">

Nom : <input type='text' name='nom' value=''>
Prenom : <input type='text' name='prenom' value=''>
Age : <input type='text' name='age' value=''>
<br><br>
<select name="langues[]" multiple="multiple">
    <option value="">Langues pratiquées (choisir au minimum 2)</option>
    <option value="francais">Francais</option>
    <option value="anglais">Anglais</option>
    <option value="allemand">Allemand</option>
    <option value="espagnol">Espagnol</option>
</select>
<br><br>
<input type="checkbox" value="HTML" name="lang[]"><label>HTML</label>
<input type="checkbox" value="CSS" name="lang[]"><label>CSS</label>
<input type="checkbox" value="PHP" name="lang[]"><label>PHP</label>
<input type="checkbox" value="SQL" name="lang[]"><label>SQL</label>
<input type="checkbox" value="C" name="lang[]"><label>C</label>
<input type="checkbox" value="C++" name="lang[]"><label>C++</label>
<input type="checkbox" value="JS" name="lang[]"><label>JS</label>
<input type="checkbox" value="Python" name="lang[]"><label>PYTHON</label>
<br><br>
<input type='submit' name='effacer' value='Effacer' >
<input type='submit' value='Envoyer' >

</form>

<?php

if(isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['age']) && isset($_GET['langues'])&&  isset($_GET['lang']) ){

echo "<h4>Recapitulatif de votre fiche d'information personnelle</h4>";
echo "Vous etes ". $_GET['prenom']. " ". $_GET['nom'];
echo "<br>";
echo "Vous avez ". $_GET['age']. " ans";
echo "<br><br>";
echo "Vous parlez : <br>";
foreach($_GET['langues'] as &$val) {
    echo "<li>".$val." </li><br>";
}
echo "<br><br>";
echo "Vous avez des cnnaissances informatique en : <br>";
foreach($_GET['lang'] as &$val) {
    echo "<li>".$val." </li><br>";
}

}
?>

<hr>
<h2>Exercice 4</h2>
<h3>Question 1</h3>

<form method="get">
<?php
if(isset($_GET['nombre1']) && isset($_GET['nombre2']) && isset($_GET['sub'])){
$res = 0;
    if($_GET['sub'] == "Division x/y") $res = $_GET['nombre1'] / $_GET['nombre2'];
    if($_GET['sub'] == "Multiplication x*y") $res = $_GET['nombre1'] * $_GET['nombre2'];
    if($_GET['sub'] == "Addition x+y") $res = $_GET['nombre1'] + $_GET['nombre2'];
    if($_GET['sub'] == "Soustraction x-y") $res = $_GET['nombre1'] - $_GET['nombre2'];

    echo "Nombre 1 : <input type='nombre1' name='nombre1' value='".$_GET['nombre1']."'>";
    echo "Nombre 2 : <input type='nombre2' name='nombre2' value='".$_GET['nombre2']."'>";
    echo "Resultat : <input type='nombreres' name='nombreres' value='".$res."'>";
    echo "<br>Cliquer sur un bouton ";
    echo "<input type='submit' name='sub' value='Addition x+y' >";
    echo "<input type='submit' name='sub' value='Soustraction x-y' >";
    echo "<input type='submit' name='sub' value='Multiplication x*y' >";
    echo "<input type='submit' name='sub' value='Division x/y' >";

}else {

    echo "Nombre 1 : <input type='nombre1' name='nombre1' value=''>";
    echo "Nombre 2 : <input type='nombre2' name='nombre2' value=''>";
    echo "Resultat : <input type='nombreres' name='nombreres' value=''>";
    echo "<br>Cliquer sur un bouton ";
    echo "<input type='submit' name='sub' value='Addition x+y' >";
    echo "<input type='submit' name='sub' value='Soustraction x-y' >";
    echo "<input type='submit' name='sub' value='Multiplication x*y' >";
    echo "<input type='submit' name='sub' value='Division x/y' >";

}

?>
</form>

<hr>
<h2>Exercice 5</h2>
<h3>Question 1</h3>

<form enctype="multipart/form-data" method="POST">
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    Fichier 1: <input name="file1" type="file" />
    <br>
    Fichier 2: <input name="file2" type="file" />
    <br>
    <input type="submit" value="Send File" />
</form>

<?php
if(isset($_FILES['file1']) && isset($_FILES['file2'])){
    $test =false;
    
    $test = move_uploaded_file($_FILES["file1"]["tmp_name"],"img/".$_FILES["file1"]["name"]);

    $test =move_uploaded_file($_FILES["file2"]["tmp_name"],"img/".$_FILES["file2"]["name"]);
    if($test==false) echo "error $test";
}

$files2 = scandir("img/");

echo "<table>";
  foreach ( $files2 as $file){
      if($file != "." && $file != "..") {
        $id_file = fopen("img/".$file, 'r+');
        echo "<tr>";
        print_r($id_file);
        echo "<td>name</td><td>".$id_file["name"]."</td>";
        echo "<td>type</td><td>".$id_file["type"]."</td>";
        echo "<td>tmp_name</td><td>".$id_file["tmp_name"]."</td>";
        echo "<td>error</td><td>".$id_file["errors"]."</td>";
        echo "<td>size</td><td>".$id_file["size"]."</td>";
        echo "<td>image</td><td><img src='img/".$file."'></img></td>";
        echo "</tr>";
      
      }
  }
  echo "</table>";


?>

<hr>
<h2>Exercice 6</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 7</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 8</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 9</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 10</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 11</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 12</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 13</h2>
<h3>Question 1</h3>

<hr>
<h2>Exercice 14</h2>
<h3>Question 1</h3>



</html>