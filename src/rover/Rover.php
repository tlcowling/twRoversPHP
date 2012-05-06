<?php
define('__ROOT__', dirname(dirname(__FILE__)));

require_once __ROOT__.'/interfaces/Subject.php';
require_once __ROOT__.'/interfaces/Observer.php';
require_once __ROOT__.'/MessageParser.php';
require_once 'RoverLocation.php';
require_once 'RoverController.php';
require_once 'RoverInstructions.php';

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
        $currentRoverDirection = $this->location->direction();
        if($currentRoverDirection == Direction::NORTH){
            $this->location->setDirection(Direction::WEST);
        }else{
            $this->location->setDirection($currentRoverDirection-1);
        }
    }

    function turnRight(){
        $currentRoverDirection = $this->location->direction();
        if($currentRoverDirection == Direction::WEST){
            $this->location->setDirection(Direction::NORTH);
        }else{
            $this->location->setDirection($currentRoverDirection+1);
        }
    }
}
