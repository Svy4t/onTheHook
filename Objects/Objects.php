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

echo("<b>1 объект:</b> " . get_class($Lada1211) .
 "<br>Двери: " . $Lada1211->getDoors() .
  "<br>Места: " . $Lada1211->getSeats() .
   "<br>Окна: " . $Lada1211->getWindows() .
    "<br><br>");

echo("<b>2 объект:</b> " . get_class($CoffeeGrinder) .
 "<br>Тип: " . $CoffeeGrinder->getType() .
  "<br>Модель: " . $CoffeeGrinder->getModel() .
   "<br>Потребление энергии: " . $CoffeeGrinder->getEnergyСonsumption() .
    "<br><br>");

echo("<b>3 объект:</b> " . get_class($HyperPC) .
 "<br>Монитор: " . $HyperPC->getMonitor() .
  "<br>Корпус: " . $HyperPC->getSystemBlock() .
   "<br>Клавиатура: " . $HyperPC->getKeyboard() .
    "<br>Мышь: " . $HyperPC->getMouse() .
     "<br>Наушники: " . $HyperPC->getHeadphones() .
      "<br><br>");

echo("<b>4 объект:</b> " . get_class($Telephone) .
 "<br>Тип: " . $Telephone->getType() .
  "<br>Модель: " . $Telephone->getModel() .
   "<br>Вес: " . $Telephone->getWeight() .
    "<br>Цвет: " . $Telephone->getColor() .
     "<br>Экран: " . $Telephone->getScreen() .
      "<br><br>");

echo("<b>5 объект:</b> " . get_class($TV) .
 "<br>Тип: " . $TV->getType() .
  "<br>Модель: " . $TV->getModel() .
   "<br>Вес: " . $TV->getWeight() .
    "<br>Цвет: " . $TV->getColor() .
     "<br>Экран: " . $TV->getScreen() .
      "<br><br>");

echo("<b>6 объект:</b> " . get_class($Courier) .
 "<br>Компания: " . $Courier->getCompany() .
  "<br>Средство передвижения: " . $Courier->getMeansOfTransportation() .
   "<br>Имя: " . $Courier->getName() .
    "<br>Фамилия: " . $Courier->getSurname() .
     "<br>Возраст: " . $Courier->getAge() .
      "<br><br>");

echo("<b>7 объект:</b> " . get_class($Trucker) .
 "<br>Контракт: " . $Trucker->getContract() . 
  "<br>Компания: " . $Trucker->getCompany() .
   "<br>Трак: " . $Trucker->getTruck() .
    "<br>Имя: " . $Trucker->getName() .
     "<br>Фамилия: " . $Trucker->getSurname() .
      "<br><br>");

echo("<b>8 объект:</b> " . get_class($GarbagedTruck) .
 "<br>Контракт: " . $GarbagedTruck->getContract() . 
  "<br>Компания: " . $GarbagedTruck->getCompany() .
   "<br>Трак: " . $GarbagedTruck->getTruck() .
    "<br>Имя: " . $GarbagedTruck->getName() .
     "<br>Фамилия: " . $GarbagedTruck->getSurname() .
      "<br><br>");

echo("<b>9 объект:</b> " . get_class($keyboard) .
 "<br>Модель: " . $keyboard->getModel() .
  "<br>Тип: " . $keyboard->getType() .
   "<br>Цвет: " . $keyboard->getColor() .
    "<br>Материал: " . $keyboard->getMaterial() .
     "<br><br>");

echo("<b>10 объект:</b> " . get_class($Fan) .
 "<br>Модель: " . $Fan->getModel() .
  "<br>Тип: " . $Fan->getType() .
   "<br>Материал: " . $Fan->getMaterial() .
    "<br><br>");

?>