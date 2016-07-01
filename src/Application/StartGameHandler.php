<?php
namespace Application;

use Ramsey\Uuid\UuidFactoryInterface;

class StartGameHandler
{
    /**
     * @var GameFactory
     */
    private $gameFactory;

    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;


    public function __construct(
        GameRepository $gameRepository,
        UuidFactoryInterface $uuidFactory,
        GameFactory $gameFactory,
        MoveGenerator $moveGenerator
    )
    {
        $this->gameRepository = $gameRepository;
        $this->uuidFactory = $uuidFactory;
        $this->gameFactory = $gameFactory;
        $this->moveGenerator = $moveGenerator;
        //   $this->game= $game;
    }

    public function handle($command)
    {
        $gameId = $this->uuidFactory->fromString($command->gameId);
        $playerName = $command->playerName;

        $game = $this->gameFactory->create($gameId, $playerName);
        $game->start($this->moveGenerator);

        $this->gameRepository->add($game);
    }
}
