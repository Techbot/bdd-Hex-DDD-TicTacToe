<?php

namespace spec\Application;

use Application\Board;
use Application\Player;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class GameSpec extends ObjectBehavior
{
    function let(UuidInterface $id, UuidInterface $gameId)
    {
       
        
        $this->beConstructedWith($id, new Player('X'), new Board(), new Player('O'));
    }

    function it_should_have_an_id(UuidInterface $id)
    {
        $this->getId()->shouldBe($id);
    }

    function it_should_have_a_board()
    {
     //   $this->shouldHaveType('Application\UUID');
    }
}
