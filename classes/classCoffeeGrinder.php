<?php 

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

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of model
     */ 
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the value of model
     *
     * @return  self
     */ 
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get the value of energyСonsumption
     */ 
    public function getEnergyСonsumption()
    {
        return $this->energyСonsumption;
    }

    /**
     * Set the value of energyСonsumption
     *
     * @return  self
     */ 
    public function setEnergyСonsumption($energyСonsumption)
    {
        $this->energyСonsumption = $energyСonsumption;

        return $this;
    }
}

?>