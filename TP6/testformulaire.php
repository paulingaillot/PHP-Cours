<?php

include "formulaire.php";

$form = new Formulaire("","GET");
$form->ajouterbouton("<input type='submit' value='Envoyer' >");
$form->ajouterzonetexte("Votre nom : <input type='text' name='nom' value=''>");
$form->ajouterzonetexte("Votre code : <input type='text' name='code' value=''>");

?>