<?php

namespace Application;

use Ramsey\Uuid\UuidInterface;

class GameFactory
{
    public function create(UuidInterface $gameId, $playerName)
    {
        $humanPlayer = new Player($playerName);
        $computerPlayer = new Player($this->getOpponentName($playerName));

        return new Game($gameId,  $humanPlayer, new Board(),$computerPlayer);
    }

    private function getOpponentName($playerName)
    {
        if ($playerName === Player::PLAYER_NAME_X) {

            return Player::PLAYER_NAME_O;

        }
        return Player::PLAYER_NAME_X;
    }
}
