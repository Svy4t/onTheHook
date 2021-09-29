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

    /**
     * Get the value of doors
     */ 
    public function getDoors()
    {
        return $this->doors;
    }

    /**
     * Set the value of doors
     *
     * @return  self
     */ 
    public function setDoors($doors)
    {
        $this->doors = $doors;

        return $this;
    }

    /**
     * Get the value of seats
     */ 
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set the value of seats
     *
     * @return  self
     */ 
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    /**
     * Get the value of windows
     */ 
    public function getWindows()
    {
        return $this->windows;
    }

    /**
     * Set the value of windows
     *
     * @return  self
     */ 
    public function setWindows($windows)
    {
        $this->windows = $windows;

        return $this;
    }

    public function Display()
    {
        echo("<b>1 объект:</b> " . get_class($this) .
        "<br>Двери: " . $this->getDoors() .
        "<br>Места: " . $this->getSeats() .
        "<br>Окна: " . $this->getWindows() .
        "<br><br>");
    }
}


?>