<?php
namespace spec\Application;

use Application\Game;
use Application\GameRepository;
use Application\GetGameQuery;
use PhpSpec\ObjectBehavior;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;

class GetGameHandlerSpec extends ObjectBehavior
{
    function let(
        GameRepository $gameRepository,
        UuidFactoryInterface $uuidFactory,
        UuidInterface $gameId,
        Game $game
    ){
        $this->beConstructedWith($gameRepository, $uuidFactory);
        $uuidFactory->fromString('1234')->willReturn($gameId);
        $gameRepository->get($gameId)->willReturn($game);

    }

    function it_should_return_a_game(Game $game)
    {
        $query = new GetGameQuery();
        $query->gameId = '1234';
        $result = $this->handle($query)->shouldBe($game);
    }
}