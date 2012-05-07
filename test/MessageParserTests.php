<?php

require_once 'simpletest/autorun.php';
require_once '../src/rover/RoverLocation.php';
require_once '../src/rover/RoverInstructions.php';

class MessageParserTests extends UnitTestCase
{
    function testMessageParserReturnsCorrectRoverInstructionsObject(){
        $inputMessageToTest = "2 4 N LRMLMRLMLMRLLLM";
        $expectedRoverLocation = new RoverLocation(2,4,Direction::NORTH);
        $expectedRoverInstructions = new RoverInstructions($expectedRoverLocation,"LRMLMRLMLMRLLLM");

        $instructions = MessageParser::parseInstructions($inputMessageToTest);

        $this->assertEqual($instructions,$expectedRoverInstructions);
    }

    function testMessageParserReturnsDefaultMessageObject(){
        $inputMessageToTest = "";
        $expectedRoverLocation = new RoverLocation(0,0,Direction::NORTH);
        $expectedRoverInstructions = new RoverInstructions($expectedRoverLocation,"");

        $instructions = MessageParser::parseInstructions($inputMessageToTest);

        $this->assertEqual($instructions,$expectedRoverInstructions);
    }
}
