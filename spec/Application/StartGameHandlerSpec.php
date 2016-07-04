<?php

namespace spec\Application;

use Application\Game;
use Application\GameFactory;
use Application\GameRepository;
use Application\MoveGenerator;
use Application\StartGameCommand;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;

class StartGameHandlerSpec extends ObjectBehavior
{

  private $uuidFactory;
  
    function let(GameRepository $gameRepository,   UuidFactoryInterface $uuidFactory, GameFactory $gameFactory, MoveGenerator $moveGenerator)
    {
        $this->beConstructedWith($gameRepository, $uuidFactory, $gameFactory, $moveGenerator);
        $gameFactory->create($uuidFactory->uuid4(),'X')->willReturn('game');
        
       $this->uuidFactory = $uuidFactory;
  
    }

    function it_should_start_a_game(
        GameRepository $gameRepository,
        Game $game,
        UuidFactoryInterface $uuidFactory
    ) {
        $command = new StartGameCommand();

        $command->gameId = $this->uuidFactory;

        print_r( $command->gameId);
        
        $command->playerName = 'X';
        
        $this->handle($command);
        $gameRepository->add($game)->shouldHaveBeenCalled();
    }
}
