<?php

require_once __ROOT__.'/MessageParser.php';

class RoverInstructions
{
    private $roverLocation;
    private $roverInstructions;

    public function __construct($roverLocation,$roverInstructions){
        $this->roverLocation = $roverLocation;
        $this->roverInstructions = $roverInstructions;
    }
}
