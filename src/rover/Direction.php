<?php

class Direction
{
    const NORTH = 0;
    const EAST = 1;
    const SOUTH = 2;
    const WEST = 3;

    public static function characterToDirection($character){
        switch($character){
            case 'N':
                return Direction::NORTH;
            case 'E':
                return Direction::EAST;
            case 'S':
                return Direction::SOUTH;
            case 'W':
                return Direction::WEST;
            default:
                return Direction::NORTH;
        }
    }
}

