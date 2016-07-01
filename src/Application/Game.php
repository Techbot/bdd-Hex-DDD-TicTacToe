<?php

namespace Application;

use Ramsey\Uuid\UuidInterface;

class Game
{

    /**
     * @var Board
     */
    private $board;

    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var Player
     */
    private $humanPlayer;
    /**
     * @var Player
     */
    private $computerPlayer;

    /**
     * Game constructor.
     * @param UuidInterface $id
     * @param Player $humanPlayer
     * @param Board $board
     * @param Player $computerPlayer
     */
    public function __construct(
        UuidInterface $id,
        Player $humanPlayer,
        Board $board,
        Player $computerPlayer)
    {
        $this->id = $id;
        $this->board= $board;
        $this->humanPlayer = $humanPlayer;
        $this->computerPlayer = $computerPlayer;
    }

    /**
     * @return UuidInterface
     */

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    public function makeHumanMove(Move $move, MoveGenerator $moveGenerator)
    {
        $this->board->makeMove($move, $this->humanPlayer);

        $this->makeComputerMove($moveGenerator);
    }

    public function getHumanPlayer()
    {
        return $this->humanPlayer;
    }

    public function getComputerPlayer()
    {
        return $this->computerPlayer;
    }

    public function makeComputerMove(MoveGenerator $moveGenerator)
    {
        $this->board->makeMove($moveGenerator->generateMove($this->board), $this->computerPlayer);
    }

    public function start(MoveGenerator $moveGenerator)
    {
        if($this->computerPlayer->isFirstToMove()){
            $this->makeComputerMove($moveGenerator);
        }
    }
}
