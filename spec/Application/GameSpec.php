<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\UuidInterface;

class GameSpec extends ObjectBehavior
{
    function let(UuidInterface $id)
    {
        $this->beConstructedWith($id);
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
