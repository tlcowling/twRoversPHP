<?php

require_once "/Users/thomasweb/Dropbox/Projects/twRoversPHP/src/rover/Rover.php";
require_once "/Users/thomasweb/Dropbox/Projects/twRoversPHP/src/rover/RoverLocation.php";
require_once "/Users/thomasweb/Dropbox/Projects/twRoversPHP/src/MessageParser.php";

class MessageParserTests extends PHPUnit_Framework_TestCase
{
    function testMessageParserReturnsCorrectRoverInstructionsObject(){
        $inputMessageToTest = "2 4 N LRMLMRLMLMRLLLM";
        $expectedRoverLocation = new RoverLocation(2,4,Direction::NORTH);
        $expectedRoverInstructions = new RoverInstructions($expectedRoverLocation,"LRMLMRLMLMRLLLM");

        $instructions = MessageParser::getRoverInstructionsFromString($inputMessageToTest);

        $this->assertEquals($instructions,$expectedRoverInstructions,"MessageParser extracted the wrong instructions from its message");
    }

    function testMessageParserReturnsDefaultRoverInstructionsObject(){
        $inputMessageToTest = "";
        $defaultRoverLocation = new RoverLocation(0,0,Direction::NORTH);
        $defaultRoverInstructions = new RoverInstructions($defaultRoverLocation,"");

        $instructions = MessageParser::getRoverInstructionsFromString($inputMessageToTest);

        $this->assertEquals($instructions,$defaultRoverInstructions);
    }
}
