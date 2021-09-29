<?php 

class Courier
{
    public $company, $meansOfTransportation, $name, $surname, $age;

    public function __construct($company, $meansOfTransportation, $name, $surname, $age)
    {
        $this->company = $company;
        $this->meansOfTransportation = $meansOfTransportation;
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

    /**
     * Get the value of company
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */ 
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of meansOfTransportation
     */ 
    public function getMeansOfTransportation()
    {
        return $this->meansOfTransportation;
    }

    /**
     * Set the value of meansOfTransportation
     *
     * @return  self
     */ 
    public function setMeansOfTransportation($meansOfTransportation)
    {
        $this->meansOfTransportation = $meansOfTransportation;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surname
     */ 
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set the value of surname
     *
     * @return  self
     */ 
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    public function Display()
    {
        echo("<b>6 объект:</b> " . get_class($this) .
        "<br>Компания: " . $this->getCompany() .
        "<br>Средство передвижения: " . $this->getMeansOfTransportation() .
        "<br>Имя: " . $this->getName() .
        "<br>Фамилия: " . $this->getSurname() .
        "<br>Возраст: " . $this->getAge() .
        "<br><br>");
    }
}

?>