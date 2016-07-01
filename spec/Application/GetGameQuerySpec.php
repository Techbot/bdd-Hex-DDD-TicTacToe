<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GetGameQuerySpec extends ObjectBehavior
{
    function it_should_have_a_game_id()
    {
        $this->gameId->shouldbeNull();
    }
}
