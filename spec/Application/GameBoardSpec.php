<?php

namespace spec\Application;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameBoardSpec extends ObjectBehavior
{
    function it_should_start_out_empty()
    {
        $this->isEmpty()->shouldBe(true);


    }
}
