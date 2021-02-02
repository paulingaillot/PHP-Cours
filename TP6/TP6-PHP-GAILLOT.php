<html>

<h1> TP 6</h1>
<hr>
<h2>Exercice 1</h2>
<h3>Question 1</h3>

<?php
class Football
{
    const NBEQ = "Nombre d'équipes :";
    static $nb = 0;
    private $nom = "test";
    private $nombre_de_titre = 0;

    static function nb_equipe() {
        echo self::NBEQ."". self::$nb;
    }

    public function display()
    {
        echo "L'équipe " . $this->nom . " a " . $this->nombre_de_titre . " titres";
    }
    public function get_nom() {
        return $this->nom;
    }
    public function get_Points() {
        return $this->nombre_de_titre;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }
    public function setPoints($points) {
        $this->nombre_de_titre = $points;
    }
    function __construct($nom="", $points=0) {
        $this->nom = $nom;
        $this->nombre_de_titre = $points;
        self::$nb++;
    }
    function __destruct () {
        echo "<br>DESTRUC";
    }

}

$p1 = new Football();
$p1->setNom("PSG");
$p1->setPoints(0);
$p1->display();

$p2 = new Football();
$p2->setNom("OL");
$p2->setPoints(1);
$p2->display();

$p3 = new Football();
$p3->setNom("OM");
$p3->setPoints(2);
$p3->display();

$p4 = new Football();
$p4->setNom("Nantes");
$p4->setPoints(3);
$p4->display();


$p4->nb_equipe();

?>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>

<?php

include "formulaire.php";

$form = new Formulaire("GET","");
$form->ajouterbouton("<input type='submit' value='Envoyer' >");
$form->ajouterzonetexte("Votre nom : <input type='text' name='nom' value=''>");
$form->ajouterzonetexte("Votre code : <input type='text' name='code' value=''>");
echo $form->getform();
?>

<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>

<form action="" method="GET">
Nom : <input type='text' name='nom' value=''>
<br><br>
Prenom : <input type='text' name='prenom' value=''>
<br><br>
Mail : <input type='text' name='mail' value=''>
<br><br>
Age : <SELECT name="age" size="1">
<OPTION>--Age--
<OPTION>0-20
<OPTION>20-40
<OPTION>40-60
<OPTION>60-80
<OPTION>80-100
<OPTION>100+
</SELECT>
<br><br>
Monsieur :<input type='radio' name='sex' value='monsieur'>
Madame :<input type='radio' name='sex' value='madame' >
<br><br>
<input type='submit' value='Submit'>
</form>

<?php

class form {
    private $nom;
    private $prenom;
    private $age;
    private $sexe;
    private $mail;

    function __construct() {
        if(isset($_GET['nom'])) $this->nom = $_GET['nom'];
        if(isset($_GET['prenom'])) $this->prenom = $_GET['prenom'];
        if(isset($_GET['mail'])) $this->mail = $_GET['mail'];
        if(isset($_GET['age'])) $this->age = $_GET['age'];
        if(isset($_GET['sex'])) $this->sexe = $_GET['sex'];
    }

    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getAge() {
        return $this->age;
    }
    public function getSexe() {
        return $this->sexe;
    }

}

$form = new form();
echo "Nom : ".$form->getNom()." Prenom : ".$form->getPrenom()." Mail : ".$form->getMail()." Age : ".$form->getAge()." Sexe : ".$form->getSexe(); 
?>

</html>