<?php

class MessageParser{
    public static function parseMessage($message){
        return $message;
    }


    public function trimMessage($message){
        return str_replace("L","",$message);
    }
}
