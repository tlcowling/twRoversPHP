<?php

define('__ROOT__', dirname(dirname(__FILE__)));

require_once __ROOT__.'/interfaces/Subject.php';
require_once __ROOT__.'/interfaces/Observer.php';
require_once __ROOT__.'/MessageParser.php';
require_once 'RoverLocation.php';
require_once 'RoverController.php';
require_once 'RoverInstructions.php';

class Rover implements Subject{

    public $location;
    private $_observers = array();

    public function __construct($location){
        $this->location = $location;
        $this->addObserver(new RoverController());
    }

    public function addObserver(Observer $observer){
        $this->_observers[] = $observer;
    }

    public function removeObserver(Observer $observer){
        foreach($this->_observers as $index => $observerInArray){
            if($observer == $observerInArray){
                unset($this->_observers[$index]);
            }
        }
    }

    public function notify(){
        foreach($this->_observers as $observer){
            $observer->update($this);
        }
    }

    public function setLocation($location){
        $this->location = $location;
        $this->save();
    }

    private function save(){
        $this->notify();
    }

    public function getLocation(){
        return $this->location;
    }

    public function processInstructions($roverInstructions){
        $location = new RoverLocation($roverInstructions[0],$roverInstructions[1],Direction::characterToDirection($roverInstructions[2]));
        $directions = $roverInstructions->directions;

        print_r($directions[0]);

        $this->setLocation($location);

        foreach($directions as $direction){
            switch($direction){
                case 'L':
                    $this->turnLeft();
                case 'R':
                    $this->turnRight();
                case 'M':
                    $this->move();
            }
        }
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

    public function turnLeft(){
        $currentRoverDirection = $this->location->direction();
        if($currentRoverDirection == Direction::NORTH){
            $this->location->setDirection(Direction::WEST);
        }else{
            $this->location->setDirection($currentRoverDirection-1);
        }
    }

    public function turnRight(){
        $currentRoverDirection = $this->location->direction();
        if($currentRoverDirection == Direction::WEST){
            $this->location->setDirection(Direction::NORTH);
        }else{
            $this->location->setDirection($currentRoverDirection+1);
        }
    }
}
