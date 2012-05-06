<?php

require_once 'Observer.php';

interface Subject
{
    public function addObserver(Observer $dependent);
    public function removeObserver(Observer $dependent);
    public function notify();
}
