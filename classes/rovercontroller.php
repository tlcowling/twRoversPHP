<?php

include_once('Includes.php');

class RoverController implements Observer
{
    public function update(Subject $subject){
        echo "Moving to " . $subject->getLocation();
    }
}
