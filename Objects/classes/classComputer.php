<?php 

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

    /**
     * Get the value of monitor
     */ 
    public function getMonitor()
    {
        return $this->monitor;
    }

    /**
     * Set the value of monitor
     *
     * @return  self
     */ 
    public function setMonitor($monitor)
    {
        $this->monitor = $monitor;

        return $this;
    }

    /**
     * Get the value of systemBlock
     */ 
    public function getSystemBlock()
    {
        return $this->systemBlock;
    }

    /**
     * Set the value of systemBlock
     *
     * @return  self
     */ 
    public function setSystemBlock($systemBlock)
    {
        $this->systemBlock = $systemBlock;

        return $this;
    }

    /**
     * Get the value of keyboard
     */ 
    public function getKeyboard()
    {
        return $this->keyboard;
    }

    /**
     * Set the value of keyboard
     *
     * @return  self
     */ 
    public function setKeyboard($keyboard)
    {
        $this->keyboard = $keyboard;

        return $this;
    }

    /**
     * Get the value of mouse
     */ 
    public function getMouse()
    {
        return $this->mouse;
    }

    /**
     * Set the value of mouse
     *
     * @return  self
     */ 
    public function setMouse($mouse)
    {
        $this->mouse = $mouse;

        return $this;
    }

    /**
     * Get the value of headphones
     */ 
    public function getHeadphones()
    {
        return $this->headphones;
    }

    /**
     * Set the value of headphones
     *
     * @return  self
     */ 
    public function setHeadphones($headphones)
    {
        $this->headphones = $headphones;

        return $this;
    }

    public function Display()
    {
        echo("<b>3 объект:</b> " . get_class($this) .
        "<br>Монитор: " . $this->getMonitor() .
        "<br>Корпус: " . $this->getSystemBlock() .
        "<br>Клавиатура: " . $this->getKeyboard() .
        "<br>Мышь: " . $this->getMouse() .
        "<br>Наушники: " . $this->getHeadphones() .
        "<br><br>");
    }
}

?>