<?php

require_once 'Subject.php';

interface Observer
{
    public function update(Subject $subject);
}
