<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StartGameCommandSpec extends ObjectBehavior
{
    function it_should_have_a_game_id()
    {
        $this->gameId->shouldbeNull();
    }

    function it_should_have_a_player_name()
    {
        $this->playerName->shouldbeNull();
    }

}
