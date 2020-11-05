<html>
<header>
<link rel="stylesheet" href="style.css">
</header>
<body>
<h1> TP 1</h1>
<hr>
<h2>Exercice 1</h2>
<h3>Question 1</h3>
<?php
    $age = rand(0,99);

    if($age <= 12) echo $age." --> Enfant";
    else if($age <= 19) echo $age." --> Ado";
    else if($age <=50) echo $age." --> Adulte";
    else if($age <= 70) echo $age." --> Senior";
    else echo $age." --> personne agée";

?>
<h3>Question 2</h3>
<?php
    $age = rand(0,99);

    switch (true) {
        case $age<=12:
            echo $age." --> Enfant";
            break;
        case $age<=19:
            echo $age." --> Ado";
            break;
        case $age<=50:
            echo $age." --> Adulte";
            break;
        case $age<=70:
            echo $age." --> Senior";
            break;
        default :
        echo $age." --> Personne agée";
        break;
    }

?>
<hr>
<h2>Exercice 2</h2>
<h3>Question 1</h3>
<?php

$tab = array('F0' => 0, 'F1' => 1, 'F2' => 1);
$i = 2;
while($i <20) {
    $i++;
    $tab['F'.$i] = $tab['F'.($i-1)] + $tab['F'.($i-2)];
}
echo "<table>";
echo "<tr>";
foreach ($tab as $key => $value) {
    echo "<td>".$key."</td>";
}
echo "</tr>";
foreach ($tab as $value) {
    echo "<td>".$value."</td>";
}
echo "</tr></table>";
?>
<h3>Question 2</h3>
<?php

$tab = array('F0' => 0, 'F1' => 1, 'F2' => 1);
$i = 0;

do {
        $i++;
        if($i>=2)$tab['F'.$i] = $tab['F'.($i-1)] + $tab['F'.($i-2)];
        echo "F".$i."/F".($i-1)." : ".$tab["F".$i]/$tab["F".($i-1)];
        echo "<br>";
}
while($i <30) ;

?>
<hr>
<h2>Exercice 3</h2>
<h3>Question 1</h3>
<?php

$res = 0;
for($i=1; $i<15; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;
echo "<br>";
$res = 0;
for($i=1; $i<150; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;
echo "<br>";
$res = 0;
for($i=1; $i<1500; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;
echo "<br>";
$res = 0;
for($i=1; $i<15000; $i++){
    $res = $res + 1/(pow($i,2));
}
$res = sqrt(6*$res);
echo $res;

?>
<hr>
<h2>Exercice 4</h2>
<h3>Question 1</h3>

</body>
</html>