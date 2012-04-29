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

    public function move(){

    }

    public function rotate(){

    }

}
