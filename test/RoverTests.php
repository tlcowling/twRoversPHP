<?php

require_once('../classes/Includes.php');

require_once('simpletest/autorun.php');

class RoverTests extends UnitTestCase{
    function testRoverIsInitialisedAtOriginFacingNorth(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $roverInitialisedAtOrigin = new Rover($startingLocation);

        $this->assertEqual($startingLocation,$roverInitialisedAtOrigin->getLocation());
    }

    function testRoverMovesOneBlockToTheNorthFromOrigin(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $expectedLocation = new RoverLocation(0,1,Direction::NORTH);
        $roverInitialisedAtOrigin = new Rover($startingLocation);

        $roverInitialisedAtOrigin->move();

        $this->assertEqual($roverInitialisedAtOrigin->getLocation(),$expectedLocation);
    }
}