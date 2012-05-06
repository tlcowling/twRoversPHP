<?php

require_once __ROOT__.'/interfaces/Observer.php';
require_once __ROOT__.'/interfaces/Subject.php';

class RoverController implements Observer
{
    public function update(Subject $subject){
        echo "Moving to " . $subject->getLocation();
    }
}
