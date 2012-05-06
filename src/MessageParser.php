<?php

require_once 'rover/RoverInstructions.php';

class MessageParser{
    public static function parseInstructions($message){
        return new RoverInstructions($message);
    }
}
