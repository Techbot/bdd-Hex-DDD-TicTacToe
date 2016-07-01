<?php
namespace Application;

use Ramsey\Uuid\UuidFactoryInterface;

class MakeMOveHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * @var MoveGenerator
     */
    private $moveGenerator;


    public function __construct(
        GameRepository $gameRepository,
        UuidFactoryInterface $uuidFactory,
        MoveGenerator $moveGenerator)
    {
        $this->gameRepository = $gameRepository;
        $this->uuidFactory = $uuidFactory;
        $this->moveGenerator = $moveGenerator;

    }

    public function handle($command)
    {
        $gameId = $this->uuidFactory->fromString($command->gameId);

        $game = $this->gameRepository->get($gameId);
        $move = new Move($command->x,$command->y);
        $game->makeHumanMove($move, $this->moveGenerator);
    }
}
