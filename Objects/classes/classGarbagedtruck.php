<?php 

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

    /**
     * Get the value of contract
     */ 
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set the value of contract
     *
     * @return  self
     */ 
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
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
     * Get the value of truck
     */ 
    public function getTruck()
    {
        return $this->truck;
    }

    /**
     * Set the value of truck
     *
     * @return  self
     */ 
    public function setTruck($truck)
    {
        $this->truck = $truck;

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
}


?>