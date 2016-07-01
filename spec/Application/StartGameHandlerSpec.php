<?php

namespace spec\Application;

use Application\Game;
use Application\GameFactory;
use Application\GameRepository;
use Application\StartGameCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StartGameHandlerSpec extends ObjectBehavior
{
    function let(GameRepository $gameRepository, GameFactory $gameFactory, Game $game)
    {
        $id ='1234';
        $this->beConstructedWith($gameRepository, $gameFactory);
        $gameFactory->create($id)->willReturn($game);
    }

    function it_should_start_a_game(
        GameRepository $gameRepository,
        Game $game
    ) {
        $command = new StartGameCommand();
        $this->handle($command);
        $gameRepository->add($game)->shouldHaveBeenCalled();
    }
}
