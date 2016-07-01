<?php
namespace Repository;

use Application\Board;
use Application\Move;
use Application\MoveGenerator;
use RuntimeException;

class MoveGeneratorStub implements MoveGenerator
{
    /**
     * @var array
     */
    private $moves;

    /**
     * MoveGeneratorStub constructor.
     * @param array $moves
     */
    public function __construct(array $moves){

        $this->moves = $moves;
    }

    public function generateMove(Board $board){

        if(empty($this->moves)){
            throw new RuntimeException ("no more moves left in Move GeneratorStub");
        }
        return array_shift($this->moves);
    }

}