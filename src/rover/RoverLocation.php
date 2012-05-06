<?php

require_once 'Direction.php';

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

    public function setDirection($direction){
        $this->direction = $direction;
    }

    public function direction(){
        return $this->direction;
    }

    public function goNorth(){
        $this->y++;
    }

    public function goEast(){
        $this->x++;
    }

    public function goSouth(){
        $this->y--;
    }

    public function goWest(){
        $this->x--;
    }
}