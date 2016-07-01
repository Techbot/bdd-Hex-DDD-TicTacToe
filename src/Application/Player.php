<?php

namespace Application;

use Ramsey\Uuid\Doctrine\UuidBinaryType;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Player
{
    const PLAYER_NAME_X = 'X';
    const PLAYER_NAME_O = 'O';

    private $name;

    public function __construct($name)
    {
        if ($name !== self::PLAYER_NAME_X && $name !== self::PLAYER_NAME_O) {
            throw new InvalidArgumentException("Invalid name for Player: ;'{$name}'");
        }
        $this->name = $name;
    }
    /**
     * @return UuidInterface
     */

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Board
     */
    public function isFirstToMove()
    {
        return $this->name === self::PLAYER_NAME_X;
    }
}
