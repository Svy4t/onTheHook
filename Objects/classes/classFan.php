<?php 

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
     * Get the value of material
     */ 
    public function getMaterial()
    {
        return $this->material;
    }

    /**
     * Set the value of material
     *
     * @return  self
     */ 
    public function setMaterial($material)
    {
        $this->material = $material;

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
}


?>