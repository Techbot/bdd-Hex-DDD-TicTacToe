<?php
namespace Application;

class Board
{
    /**
     * @var string[][]
     */
    private $pieces = array();

    public function getNumberOfSymbols()
    {

        //print_r($this->pieces);
        return array_sum(array_map(function(array $column){

            return count($column);

        }, $this->pieces));
    }

    public function makeMove(Move $move, Player $player)
    {

        echo ( $move->getX());

       // echo $player;

        $this->pieces[$move->getX()][$move->getY()] = $player;

        print_r($this->getNumberOfSymbols() . PHP_EOL);


    }
}
