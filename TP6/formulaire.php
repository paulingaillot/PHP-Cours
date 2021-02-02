<?php
class Formulaire
{
    private $entete = "";
    private $text =array("");
    private $button = array("");

    function __construct($method, $name) {
        $this->entete = "<form action=\"".$name."\" method=\"".$method."\">";
    }

    public function ajouterzonetexte($text) {
        array_push($this->text, $text);
    }

    public function ajouterbouton($button) {
        array_push($this->button, $button);
    }

    public function getform() {
        $res = $this->entete;

        foreach($this->text as $text) {
            $res = $res.$text."<br>";
        }
        $res= $res."<br>";

        foreach($this->button as $button) {
            $res = $res.$button."<br>";
        }

        return $res."</form>";
    }

}
?>