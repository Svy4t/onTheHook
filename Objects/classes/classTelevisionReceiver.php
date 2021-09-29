<?php 

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
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight($weight)
    {
        $this->weight = $weight;

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
     * Get the value of screen
     */ 
    public function getScreen()
    {
        return $this->screen;
    }

    /**
     * Set the value of screen
     *
     * @return  self
     */ 
    public function setScreen($screen)
    {
        $this->screen = $screen;

        return $this;
    }

    public function Display()
    {
        echo("<b>5 объект:</b> " . get_class($this) .
        "<br>Тип: " . $this->getType() .
        "<br>Модель: " . $this->getModel() .
        "<br>Вес: " . $this->getWeight() .
        "<br>Цвет: " . $this->getColor() .
        "<br>Экран: " . $this->getScreen() .
        "<br><br>");
    }
}

?>