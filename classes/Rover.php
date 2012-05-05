<?php

include_once('Includes.php');

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

class Rover implements Subject
{
    public $location;
    private $_observers = array();

    public function __construct($location){
        $this->location = $location;
        $this->addObserver(new RoverController());
    }

    public function addObserver(Observer $observer)
    {
        $this->_observers[] = $observer;
    }

    public function removeObserver(Observer $observer)
    {
        foreach($this->_observers as $index => $observerInArray){
            if($observer == $observerInArray){
                unset($this->_observers[$index]);
            }
        }
    }

    public function notify()
    {
        foreach($this->_observers as $observer){
            $observer->update($this);
        }
    }

    private function save(){
        $this->notify();
    }

    public function setLocation($location){
        $this->location = $location;
        $this->save();
    }

    public function getLocation(){
        return $this->location;
    }

    public function processInstructions($instructions){
        echo MessageParser::parseMessage($instructions);
    }

    public function move(){
        switch($this->location->direction()){
            case Direction::NORTH:
                $this->location->goNorth();
                break;
            case Direction::EAST:
                $this->location->goEast();
                break;
            case Direction::SOUTH:
                $this->location->goSouth();
                break;
            case Direction::WEST:
                $this->location->goEast();
                break;
            default:
                break;
        }
    }

    function turnLeft(){
        echo $this->location->toString();

        echo "Turning left";
    }

    function turnRight($direction){
        if($direction == Direction::WEST){
            return 0;
        }
        return $direction++;
    }
}
