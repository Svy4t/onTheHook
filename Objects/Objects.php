<?php 

include 'classes/classTaxi.php';
include 'classes/classCoffeeGrinder.php';
include 'classes/classComputer.php';
include 'classes/classTelephone.php';
include 'classes/classTelevisionReceiver.php';
include 'classes/classCourier.php';
include 'classes/classTrucker.php';
include 'classes/classGarbagedTruck.php';
include 'classes/classKeyboard.php';
include 'classes/classFan.php';

$Lada1211 = new Taxi(3,1,4);
$CoffeeGrinder = new CoffeeGrinder("PEAK Espresso grinder","Mahlkonig","690 Вт");
$HyperPC = new Computer("HP","Thermaltake","DEXP","Logitech","SVEN");
$Telephone = new Telephone("Samsung","A40","145 г","black","Разрешение 1920x1080");
$TV = new TelevisionReceiver("Samsung","Qled 8K","84.9 кг","black","Разрешение 7680x4320");
$Courier = new Courier("Delivery Club","Car","Svyatoslav","Anufriev","18");
$Trucker = new Trucker("with company Pepsi","Vezubr","MAN","Svyatoslav","Anufriev");
$GarbagedTruck = new GarbagedTruck("Sovetsky district","ЭкоЛиния","КАМАЗ","Svyatoslav","Anufriev");
$keyboard = new Keyboard("DEXP","437626","black","plastic");
$Fan = new Fan("Centek","CT-5040","plastic");

$Lada1211->Display();
$CoffeeGrinder->Display();
$HyperPC->Display();
$Telephone->Display();
$TV->Display();
$Courier->Display();
$Trucker->Display();
$GarbagedTruck->Display();
$keyboard->Display();
$Fan->Display();

?>