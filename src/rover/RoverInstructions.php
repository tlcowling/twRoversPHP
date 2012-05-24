<?php

require_once dirname(__FILE__).'/../MessageParser.php';

class RoverInstructions
{
    private $roverLocation;
    private $roverInstructions;

    public function __construct($roverLocation,$roverInstructions){
        $this->roverLocation = $roverLocation;
        $this->roverInstructions = $roverInstructions;
    }
}
