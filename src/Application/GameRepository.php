<?php

namespace Application;

use Ramsey\Uuid\UuidInterface;

interface GameRepository{


    /**
     * @param UuidInterface $id
     * @return Game
     */
    public function get(UuidInterface $id);

    /**
     * @param Game $game
     * @return void
     */
    public function add(Game $game);
}
