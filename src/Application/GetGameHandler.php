<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 23/06/2016
 * Time: 12:30
 */

namespace Application;


use Ramsey\Uuid\UuidFactoryInterface;

class getGameHandler
{

    public function __construct(GameRepository $gameRepository, UuidFactoryInterface $uuidFactory)
    {
        $this->gameRepository = $gameRepository;
        $this->uuidFactory = $uuidFactory;

    }

    public function handle(GetGameQuery $query)
    {
        $Uuid = $this->uuidFactory->fromString($query->gameId);
        return $this->gameRepository->get($Uuid);
    }


}