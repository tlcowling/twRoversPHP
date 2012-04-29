<?php

include_once('Includes.php');

interface Subject
{
    public function addObserver(Observer $dependent);
    public function removeObserver(Observer $dependent);
    public function notify();
}
