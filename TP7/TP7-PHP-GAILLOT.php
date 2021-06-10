<html>

<body>
    <h1> TP 7</h1>
    <hr>
    <h2>Exercice 1</h2>
    <h3>Question 1</h3>
    <?php

    class Formulaire
    {
        protected $text = "";

        function __construct($method, $name)
        {
            $this->text = "<form action=\"" . $name . "\" method=\"" . $method . "\">";
        }

        public function ajouterzonetexte($text)
        {
            $this->text = $this->text . $text;
        }

        public function ajouterbouton($button)
        {
            $this->text = $this->text . $button;
        }

        public function getform()
        {
            return $this->text . "</form>";
        }
    }

    class formulaire2 extends formulaire
    {

        public function ajouterradio($radio)
        {
            $this->text = $this->text . $radio;
        }

        public function ajoutercoche($coche)
        {
            $this->text = $this->text . $coche;
        }
    }

    $form = new Formulaire2("GET", "");
    $form->ajouterzonetexte("Votre nom : <input type='text' name='nom' value=''><br>");
    $form->ajouterzonetexte("Votre code : <input type='text' name='code' value=''><br>");
    $form->ajouterradio("  <input type='radio' id='huey' name='drone' value='huey'
>
<label for='huey'>Huey</label><br>");
    $form->ajoutercoche("<input type='checkbox' id='scales' name='scales'
>
<label for='scales'>Scales</label><br>");
    $form->ajouterbouton("<input type='submit' value='Envoyer' ><br>");
    echo $form->getform();


    ?>

    <hr>
    <h2>Exercice 2</h2>
    <h3>Question 1</h3>

    <?php

    abstract class Shape
    {

        abstract function getArea();
    }

    class Square extends Shape
    {

        private $width;
        private $height;

        function __construct($width = 0, $height = 0)
        {
            $this->width = $width;
            $this->height = $height;
        }

        function getArea()
        {
            return $this->width * $this->height;
        }
    }

    class Circle extends Shape
    {

        private $radius;

        function __construct($rad = 0)
        {
            $this->radius = $rad;
        }

        function getArea()
        {
            return pi() * $this->radius * $this->radius;
        }
    }

    $circle = new Circle(5);
    $square = new Square(2, 2);
    echo $circle->getArea() . "<br>";
    echo $square->getArea() . "<br>";

    echo "<h3>Question 4</h3>";

    $tab = array(new Circle(2), new Square(2, 1));
    foreach ($tab as $value) {
        echo get_class($value) . " Area : " . $value->getArea() . "<br>";
    }

    ?>

    <hr>
    <h2>Exercice 3</h2>
    <h3>Question 1</h3>

    <?php

    trait Un
    {

        function small($text)
        {
            echo "<small>" . $text . "</small><br>";
        }

        function big($text)
        {
            echo "<h4>" . $text . "</h4>";
        }
    }
    echo "<h3>Question 2</h3>";

    trait Deux
    {
        function small($text)
        {
            echo "<i>" . $text . "</i><br>";
        }

        function big($text)
        {
            echo "<h3>" . $text . "</h3>";
        }
    }
    echo "<h3>Question 2 (bis)</h3>";

    class Texte
    {
        use Un, DEUX {
            Deux::small insteadof Un;
            Un::big insteadof Deux;
            Deux::big as gros;
            Un::small as petit;
        }
    }

    echo "<h3>Question 3</h3>";

    $t = new Texte;
    $t->big("Test n°1");
    $t->gros("Test n°2");
    $t->small("Test n°3");
    $t->petit("Test n°4");

    ?>

    <hr>
    <h2>Exercice 4</h2>

    <?php

    class Sapin
    {
        private $decorations = array();
        private $masse;
        private $masse_deco;

        function __construct($masse)
        {
            $this->masse = $masse;
            $this->masse_deco = 0;
        }

        function affichage()
        {
            echo "Ce sapin de Noel peut supporter " . $this->masse . "g de décoration. <br>";
            if (sizeof($this->decorations) == 0) {
                echo "Il ne contient actuelement aucune decoration.";
            } else {
                echo "Il contient actuelement " . $this->masse_deco . "g de decorations, listées ci-après :<br>";
                foreach ($this->decorations as  $value) {
                    $value->affichage();
                    echo "<br>";
                }
            }
        }

        function add_decoration($deco)
        {
            if ($deco->getMasse() + $this->masse_deco < $this->masse) {
                $this->masse_deco += $deco->getMasse();
                array_push($this->decorations, $deco);
                return;
            } else {
                echo "ALERT ! Attention votre sapin pourrait s'ecrouler.<br><br>";
                return;
            }
        }
    }

    abstract class Decoration
    {
        protected $color;
        protected $masse;

        function getMasse()
        {
            return $this->masse;
        }
    }

    class Boule extends Decoration
    {
        private $diametre;

        function __construct($diam, $color, $masse)
        {
            $this->diametre = $diam;
            $this->masse = $masse;
            $this->color = $color;
        }

        function affichage()
        {
            echo "* " . get_class($this) . " " . $this->color . " de " . $this->diametre . "cm de diamètre pesant " . $this->masse . "g";
        }
    }

    class Guirlande extends Decoration
    {
        private $longueur;

        function __construct($longueur, $color, $masse)
        {
            $this->longueur = $longueur;
            $this->masse = $masse;
            $this->color = $color;
        }

        function affichage()
        {
            echo "* " . get_class($this) . " " . $this->color . " de " . $this->longueur . "cm de long pesant " . $this->masse . "g";
        }
    }

    class Guirlande_Lumineuse extends Guirlande
    {
        private $nb_led;

        function __construct($nb_led, $color, $masse, $longueur)
        {
            $this->nb_led = $nb_led;
            $this->masse = $masse;
            $this->color = $color;
            $this->longueur = $longueur;
        }

        function affichage()
        {
            echo "* " . get_class($this) . " " . $this->color . " de " . $this->longueur . "cm de long, possedant " . $this->nb_led . " lumières et pesant " . $this->masse . "g";
        }
    }

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    $s = new Sapin(1000);
    $s->add_decoration(new Boule(2, "bleue", 50));
    $s->add_decoration(new Guirlande(1, "rouge", 50));
    $s->add_decoration(new Guirlande_Lumineuse(5000, "multicolor", 500, 5));
    $s->add_decoration(new Boule(1, "blanche", 10000));
    $s->affichage();

    $test = true;
    echo (bool)isset($test);
    echo "---------------<br>";
    echo "empty : {empty($test)}<br>";



    ?>


</body>

</html>