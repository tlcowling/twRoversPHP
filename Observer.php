<?php

include_once('Includes.php');

interface Observer
{
    public function update(Subject $subject);
}
