<?php
require_once dirname(__FILE__)."/../src/rover/Rover.php";
require_once dirname(__FILE__)."/../src/rover/RoverLocation.php";

class RoverTests extends PHPUnit_Framework_TestCase{

    function testRoverIsInitialisedAtOriginFacingNorth(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $roverInitialisedAtOrigin = new Rover($startingLocation);

        $this->assertEquals($startingLocation,$roverInitialisedAtOrigin->getLocation());
    }

    function testRoverMovesOneBlockToTheNorthFromOrigin(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $expectedLocation = new RoverLocation(0,1,Direction::NORTH);
        $roverInitialisedAtOrigin = new Rover($startingLocation);

        $roverInitialisedAtOrigin->move();

        $this->assertEquals($roverInitialisedAtOrigin->getLocation(),$expectedLocation);
    }

    function testRoverSuccessfullyRotatesLeftFromNorthToWest(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $locationAndDirectionAfterLeftRotation = new RoverLocation(0,0,Direction::WEST);
        $roverThatWillRotateLeft = new Rover($startingLocation);

        $roverThatWillRotateLeft->turnLeft();

        $this->assertEquals($locationAndDirectionAfterLeftRotation,$roverThatWillRotateLeft->getLocation());
    }

    function testRoverSuccessfullyRotatesLeftFromWestToSouth(){
        $startingLocation = new RoverLocation(0,0,Direction::WEST);
        $locationAndDirectionAfterLeftRotation = new RoverLocation(0,0,Direction::SOUTH);
        $roverThatWillRotateLeft = new Rover($startingLocation);

        $roverThatWillRotateLeft->turnLeft();

        $this->assertEquals($locationAndDirectionAfterLeftRotation,$roverThatWillRotateLeft->getLocation());
    }

    function testRoverSuccessfullyRotatesRightFromNorthToEast(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $locationAndDirectionAfterRightRotation = new RoverLocation(0,0,Direction::EAST);
        $roverThatWillRotateRight = new Rover($startingLocation);

        $roverThatWillRotateRight->turnRight();

        $this->assertEquals($locationAndDirectionAfterRightRotation,$roverThatWillRotateRight->getLocation());
    }

    function testRoverSuccessfullyRotatesRightFromWestToNorth(){
        $startingLocation = new RoverLocation(0,0,Direction::WEST);
        $locationAndDirectionAfterRightRotation = new RoverLocation(0,0,Direction::NORTH);
        $roverThatWillRotateRight = new Rover($startingLocation);

        $roverThatWillRotateRight->turnRight();

        $this->assertEquals($locationAndDirectionAfterRightRotation,$roverThatWillRotateRight->getLocation());
    }

    function testRoverRotatesBackToStartingDirectionAfterFourRotations(){
        $startingLocation = new RoverLocation(0,0,Direction::NORTH);
        $locationAndDirectionAfterFullRotation = new RoverLocation(0,0,Direction::NORTH);
        $roverThatWillFullyRotate = new Rover($startingLocation);

        $roverThatWillFullyRotate->turnLeft();
        $roverThatWillFullyRotate->turnLeft();
        $roverThatWillFullyRotate->turnLeft();
        $roverThatWillFullyRotate->turnLeft();

        $this->assertEquals($locationAndDirectionAfterFullRotation,$roverThatWillFullyRotate->getLocation());
    }

    function testRoverProcessesInstructions(){
        $roverThatWillProcessInstructions = new Rover(new RoverLocation(0,0,Direction::NORTH));
        $expectedLocation = new RoverLocation(1,2,Direction::EAST);

        $roverThatWillProcessInstructions->move();
        $roverThatWillProcessInstructions->move();
        $roverThatWillProcessInstructions->turnRight();
        $roverThatWillProcessInstructions->move();

        $this->assertEquals($expectedLocation,$roverThatWillProcessInstructions->getLocation());
    }
}
