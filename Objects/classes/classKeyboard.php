<?php 

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
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $color;

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

    public function Display()
    {
        echo("<b>9 объект:</b> " . get_class($this) .
        "<br>Модель: " . $this->getModel() .
        "<br>Тип: " . $this->getType() .
        "<br>Цвет: " . $this->getColor() .
        "<br>Материал: " . $this->getMaterial() .
        "<br><br>");
    }
}


?>