<?php 

// include 'classBaseAuto.php';

class GibridAuto extends Baseauto
{
    private $dvig, $KBt;
    
    function __construct($name,$color,$type,$dvig, $KBt)
    {
        parent::__construct($name,$color,$type);
        $this->setDvig($dvig);
        $this->KBt = $KBt;
    }

    

    /**
     * Get the value of dvig
     */ 
    public function getDvig()
    {
        return $this->dvig;
    }

    /**
     * Set the value of dvig
     *
     * @return  self
     */ 
    public function setDvig($dvig)
    {
        $this->dvig = $dvig;

        return $this;
    }

    /**
     * Get the value of KBt
     */ 
    public function getKBt()
    {
        return $this->KBt;
    }

    /**
     * Set the value of KBt
     *
     * @return  self
     */ 
    public function setKBt($KBt)
    {
        $this->KBt = $KBt;

        return $this;
    }
}

?>