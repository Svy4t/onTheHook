<?php 

include 'classesInheritance/classBaseAuto.php';
include 'classesInheritance/classElAuto.php';
include 'classesInheritance/classGibridAuto.php';

$Nissan = new GibridAuto("Nissan","black","crossover",143,1000);
$Lada = new GibridAuto("Lada","purple","sedan",67,504);

$fp1 = 'GibridAuto.txt';
$handle1 = fopen($fp1, 'a');
$somecontent1 = "The name of the first car: " . $Nissan->getName() . 
    "\ncolor: " . $Nissan->getColor() . 
    "\ntype: " . $Nissan->getType() . 
    "\nengine power: " . $Nissan->getDvig() . " horsepower" .
    "\npower battery: " . $Nissan->getKBt() . " KBt" .

    "\n\nThe name of the second car: " . $Lada->getName() . 
    "\ncolor: " . $Lada->getColor() . 
    "\ntype: " . $Lada->getType() . 
    "\nengine power: " . $Lada->getDvig() . " horsepower" .
    "\npower battery: " . $Lada->getKBt() . " KBt"; 

fwrite($handle1, $somecontent1);
echo "Записали данные в файл ($fp1)";
fclose($handle1);

$Toyota = new ElAuto("Toyota","green","sedan",1200,75000);
$Kia = new ElAuto("Kia","yellow and blue","sedan",1500,20000);

$fp2 = 'ElAuto.txt';
$handle2 = fopen($fp2, 'a');
$somecontent2 = "The name of the first car: " . $Toyota->getName() . 
    "\ncolor: " . $Toyota->getColor() . 
    "\ntype: " . $Toyota->getType() . 
    "\ncapacity battery: " . $Toyota->getCapacity() . " KBt" .
    "\npower battery: " . $Toyota->getDistance() . " km" .

    "\n\nThe name of the second car: " . $Kia->getName() . 
    "\ncolor: " . $Kia->getColor() . 
    "\ntype: " . $Kia->getType() . 
    "\nengine power: " . $Kia->getCapacity() . " KBt" .
    "\nkm of traffic: " . $Kia->getDistance() . " km"; 

fwrite($handle2, $somecontent2);
echo "<br>Записали данные в файл ($fp2)";
fclose($handle2);
?>