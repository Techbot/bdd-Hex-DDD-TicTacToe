<?php
namespace Application;


class Move
{
    /**
     * @var int
     */
    private $x;

    /**
     * @var int
     */
    private $y;

    /**
     * @param $x
     * @param $y
     */
    public function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX(){

        return $this->x;

    }

    /**
     * @return int
     */
    public function getY(){

        return $this->y;

    }

}