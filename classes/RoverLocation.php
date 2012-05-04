<?php

class RoverLocation
{
    private $x = 0;
    private $y = 0;
    private $direction = Direction::NORTH;

    public function __construct($x,$y,$direction){
        $this->x = $x;
        $this->y = $y;
        $this->direction = $direction;
    }

    public function toString(){
        return "(".$this->x.",".$this->y."), direction: ".$this->direction."\n";
    }
}
