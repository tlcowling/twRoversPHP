<?php

include_once('Includes.php');

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

    public function save(){
        $this->notify();
    }

    public function setLocation($location){
        $this->location = $location;
        $this->save();
    }

    public function getLocation(){
        return $this->location->toString();
    }

    public function processInstructions($instructions){
        echo MessageParser::parseMessage($instructions);
    }

    public function move(){
        switch($this->location->direction){
            case Direction::NORTH:
                $this->location->y++;
                break;
            case Direction::EAST:
                $this->location->x++;
                break;
            case Direction::SOUTH:
                $this->location->y--;
                break;
            case Direction::WEST:
                $this->location->x--;
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
