<?php

require_once 'rover/RoverInstructions.php';

class MessageParser{
    public static function getRoverInstructionsFromString($message){
        if(!empty($message)){
            $message_components = explode(" ",$message);

            $message_components[2] = Direction::characterToDirection($message_components[2]);

            $roverLocation = new RoverLocation($message_components[0],$message_components[1],$message_components[2]);
            $instructions = $message_components[3];

            return new RoverInstructions($roverLocation,$instructions);
        }
        return MessageParser::getDefaultRoverInstructions();
    }

    public static function getDefaultRoverInstructions(){
        return new RoverInstructions(new RoverLocation(0,0,Direction::NORTH),"");
    }
}
