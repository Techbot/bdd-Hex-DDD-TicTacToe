<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\UuidInterface;

class GameFactorySpec extends ObjectBehavior
{
    function it_should_create_a_game(UuidInterface $id)
    {
        $this->create($id)->shouldHaveType('Application\Game');
    }
}
