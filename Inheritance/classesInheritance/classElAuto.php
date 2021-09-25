<?php 

// include 'classBaseAuto.php';

class ElAuto extends Baseauto
{
    private $capacity, $distance;

    function __construct($name,$color,$type,$capacity, $distance)
    {
        parent::__construct($name,$color,$type);
        $this->setCapacity($capacity);
        $this->distance = $distance;
    }

    

    /**
     * Get the value of capacity
     */ 
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @return  self
     */ 
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get the value of distance
     */ 
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set the value of distance
     *
     * @return  self
     */ 
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }
}

?>