<?php 

class Taxi
{
    public $doors, $seats, $windows;
    
    public function __construct($doors, $seats, $windows)
    {
        $this->doors = $doors;
        $this->seats = $seats;
        $this->windows = $windows;
    }
    
    function startEngine()
    {
        // Завести мотор
    }
    function go()
    {
        // Найти клиента
    }
    function stop()
    {
        //  Подъехать к клиенту и остановиться
    }
    function turnLeft()
    {
        // Начать движение по маршруту
    }
    function turnRight()
    {
        // Закончить движение по маршруту
    }
    function searchClient()
    {
        // Завершить заказ
    }
    function finishTheTrip()
    {
        // Заглушить мотор
    }
}

$Lada1211 = new Taxi(3,1,4);

class CoffeeGrinder
{
    public $type, $model, $energyСonsumption;
    
    public function __construct($type, $model, $energyСonsumption)
    {
        $this->type = $type;
        $this->model = $model;
        $this->energyСonsumption = $energyСonsumption;
    }
    
    function fillItUp()
    {
        // Насыпать кофе
    }
    function turnOn()
    {
        // Включить кофемолку
    }
    function wait()
    {
        // подождать окончания работы
    }
    function pullOut()
    {
        // вытащить молотый кофе
    }
    function clean()
    {
        // почистить кофемолку 
    }
    function turnOff()
    {
        // выключить кофемолку
    }
}

$CoffeeGrinder = new CoffeeGrinder("PEAK Espresso grinder","Mahlkonig","690 Вт");

class Computer
{
    public $monitor, $systemBlock, $keyboard, $mouse, $headphones;

    public function __construct($monitor, $systemBlock, $keyboard, $mouse, $headphones)
    {
        $this->monitor = $monitor;
        $this->systemBlock = $systemBlock;
        $this->keyboard = $keyboard;
        $this->mouse = $mouse;
        $this->headphones = $headphones;
    }
    
    function turnOn()
    {
        // Включить PC
    }
     function chooseUser()
    {
        // выбрать пользователя
    }
    function startWorking()
    {
        // Начать взаимодействовать с компьютером
    }
    function finishWorking()
    {
        // Закончить работать
    }
    function turnOff()
    {
        // Выключить PC 
    }
}

$HyperPC = new Computer("HP","Thermaltake","DEXP","Logitech","SVEN");

class Telephone
{
    public $type, $model, $weight, $color, $screen;

    public function __construct($type, $model, $weight, $color, $screen)
    {
        $this->type = $type;
        $this->model = $model;
        $this->weight = $weight;
        $this->color = $color;
        $this->screen = $screen;
    }
    
    function turnOn()
    {
        // Включить телефон 
    }
     function enterThePassword()
    {
        // Ввести пароль
    }
    function startWorking()
    {
        // Работать с телефоном 
    }
    function finishWorking()
    {
        // Закончить работу
    }
    function turnOff()
    {
        // Выключить телефон 
    }
    function putItOnCharge()
    {
        // Поставить на зарядку
    }
}

$Telephone = new Telephone("Samsung","A40","145 г","black","Разрешение 1920x1080");

class TelevisionReceiver
{
    public $type, $model, $weight, $color, $screen;

    public function __construct($type, $model, $weight, $color, $screen)
    {
        $this->type = $type;
        $this->model = $model;
        $this->weight = $weight;
        $this->color = $color;
        $this->screen = $screen;
    }
    
    function turnOnTV()
    {
        // Включить телевизор 
    }
     function turnOnTVsettopBox()
    {
        // Включить приставку
    }
    function chooseChannel()
    {
        // Выбрать канал
    }
    function switchChannel()
    {
        // Переключить канал
    }
    function turnOffTV()
    {
        // Выключить телевизор 
    }
    function turnOffTVsettopBox()
    {
        // Выключить приставку
    }
}

$TV = new TelevisionReceiver("Samsung","Qled 8K","84.9 кг","black","Разрешение 7680x4320");

class Courier
{
    public $company, $meansOfTransportation, $name, $surname, $age;

    public function __construct($company, $meansOfTransportation, $name, $surname, $age)
    {
        $this->company = $company;
        $this->commeansOfTransportationpany = $meansOfTransportation;
        $this->name = $name;
        $this->surname = $surname;
        $this->age = $age;
    }

    function takeAnOrder()
    {
        // Взять заказ 
    }
    function takeTheProduct()
    {
        // Взять продукт 
    }
    function selectVehicle()
    {
        // Выбрать транспортное средство
    }
    function plotARoute()
    {
        // Проложить маршрут
    }
    function go()
    {
        // Движение по маршруту 
    }
    function turnLeft()
    {
        // Движение по маршруту  
    }
    function turnRight()
    {
        // Движение по маршруту  
    }
    function deliverTheOrder()
    {
        // Доставить заказ 
    }
    function completTheOrder()
    {
        // Завершить заказ 
    }
}

$Courier = new Courier("Delivery Club","Car","Svyatoslav","Anufriev","18");

class Trucker
{
    public $contract, $company, $truck, $name, $surname;

    public function __construct($contract, $company, $truck, $name, $surname)
    {
        $this->contract = $contract;
        $this->company = $company;
        $this->truck = $truck;
        $this->name = $name;
        $this->surname = $surname;
    }

    function takeTruck()
    {
        // Взять грузовик 
    }
    function toComeForTheCargo()
    {
        // Приехать за грузом
    }
    function attachTheLoad()
    {
        // Прицепить груз
    }
    function plotARoute()
    {
        // Проложить маршрут
    }
    function go()
    {
        // Движение по маршруту 
    }
    function turnLeft()
    {
        // Движение по маршруту  
    }
    function turnRight()
    {
        // Движение по маршруту  
    }
    function deliverTheCargo()
    {
        // Доставить груз
    }
    function unhookTheLoad()
    {
        // Отцепить груз 
    }
    function completeCargoTransportation()
    {
        // Завершить грузоперевозку 
    }
}

$Trucker = new Trucker("with company Pepsi","Vezubr","MAN","Svyatoslav","Anufriev");

class GarbagedTruck
{
    public $contract, $company, $truck, $name, $surname;

    public function __construct($contract, $company, $truck, $name, $surname)
    {
        $this->contract = $contract;
        $this->company = $company;
        $this->truck = $truck;
        $this->name = $name;
        $this->surname = $surname;
    }

    function plotARoute()
    {
        // Проложить маршрут
    }
    function go()
    {
        // Движение по маршруту 
    }
    function turnLeft()
    {
        // Движение по маршруту  
    }
    function turnRight()
    {
        // Движение по маршруту  
    }
    function garbageCollection()
    {
        // Сбор мусора
    }
    function TripToTheLandfill()
    {
        // Поездка на свалку
    }
    function dumpingGarbage()
    {
        // Сброс мусора  
    }
}

$GarbagedTruck = new GarbagedTruck("Sovetsky district","ЭкоЛиния","КАМАЗ","Svyatoslav","Anufriev");

class Keyboard
{
    public $model, $type, $color, $material;

    public function __construct($model, $type, $color, $material)
    {
        $this->model = $model;
        $this->type = $type;
        $this->color = $color;
        $this->material = $material;
    }

    function turnOn()
    {
        // Включить
    }
    function use()
    {
        // Использовать
    }
    function clean()
    {
        // Чистить
    }
    function chooseTheColor()
    {
        // Менять цвет
    }
    function turnOff()
    {
        // Выключить
    }
}

$keyboard = new Keyboard("DEXP","437626","black","plastic");

class Fan
{
    public $model, $type, $material;

    public function __construct($model, $type, $material)
    {
        $this->model = $model;
        $this->type = $type;
        $this->material = $material;
    }

    function plug()
    {
        // Подключить к сети
    }
    function turnOn()
    {
        // Включить
    }
    function chooseTheSpeedFan()
    {
        // Выбрать скорость
    }
    function turnOff()
    {
        // Выключить
    }
    function pullItOutOfTheSocket()
    {
        // Вытащить из розетки
    }
}

$Fan = new Fan("Centek","CT-5040","plastic");

var_dump($Lada1211); echo("<br><br>"); 
var_dump($CoffeeGrinder); echo("<br><br>"); 
var_dump($HyperPC); echo("<br><br>"); 
var_dump($Telephone); echo("<br><br>"); 
var_dump($TV); echo("<br><br>"); 
var_dump($Courier); echo("<br><br>"); 
var_dump($Trucker); echo("<br><br>"); 
var_dump($GarbagedTruck); echo("<br><br>"); 
var_dump($keyboard); echo("<br><br>"); 
var_dump($Fan);

?>