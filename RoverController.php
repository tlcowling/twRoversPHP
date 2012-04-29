<?php

include_once('Includes.php');

class RoverController implements Observer
{
    private $roverArray = array();

    public function update(Subject $subject)
    {
        echo "Moving to " . $subject->getLocation();
    }
}

$roverController = new RoverController();

$rover = new Rover(new RoverLocation(0,0,Direction::NORTH));
$rover->setLocation(new RoverLocation(1,1,Direction::EAST));
$rover->setLocation(new RoverLocation(2,2,Direction::SOUTH));


