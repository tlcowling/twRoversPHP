<?php

require_once 'simpletest/autorun.php';
require_once '../src/rover/RoverLocation.php';
require_once '../src/rover/Rover.php';

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

    function testRoverSuccessfullyRotatesLeftFromNorthToWest(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $locationAndDirectionAfterLeftRotation = new RoverLocation(0,0,Direction::WEST);
        $roverThatWillRotateLeft = new Rover($startingLocation);

        $roverThatWillRotateLeft->turnLeft();

        $this->assertEqual($locationAndDirectionAfterLeftRotation,$roverThatWillRotateLeft->getLocation());
    }

    function testRoverSuccessfullyRotatesLeftFromWestToSouth(){
        $startingLocation = new RoverLocation(0,0,Direction::WEST);
        $locationAndDirectionAfterLeftRotation = new RoverLocation(0,0,Direction::SOUTH);
        $roverThatWillRotateLeft = new Rover($startingLocation);

        $roverThatWillRotateLeft->turnLeft();

        $this->assertEqual($locationAndDirectionAfterLeftRotation,$roverThatWillRotateLeft->getLocation());
    }

    function testRoverSuccessfullyRotatesRightFromNorthToEast(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $locationAndDirectionAfterRightRotation = new RoverLocation(0,0,Direction::EAST);
        $roverThatWillRotateRight = new Rover($startingLocation);

        $roverThatWillRotateRight->turnRight();

        $this->assertEqual($locationAndDirectionAfterRightRotation,$roverThatWillRotateRight->getLocation());
    }

    function testRoverSuccessfullyRotatesRightFromWestToNorth(){
        $startingLocation = new RoverLocation(0,0,Direction::WEST);
        $locationAndDirectionAfterRightRotation = new RoverLocation(0,0,Direction::NORTH);
        $roverThatWillRotateRight = new Rover($startingLocation);

        $roverThatWillRotateRight->turnRight();

        $this->assertEqual($locationAndDirectionAfterRightRotation,$roverThatWillRotateRight->getLocation());
    }

    function testRoverRotatesBackToStartingDirectionAfterFourRotations(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $locationAndDirectionAfterFullRotation = new RoverLocation(0,0,Direction::NORTH);
        $roverThatWillFullyRotate = new Rover($startingLocation);

        $roverThatWillFullyRotate->turnLeft();
        $roverThatWillFullyRotate->turnLeft();
        $roverThatWillFullyRotate->turnLeft();
        $roverThatWillFullyRotate->turnLeft();

        $this->assertEqual($locationAndDirectionAfterFullRotation,$roverThatWillFullyRotate->getLocation());
    }
}