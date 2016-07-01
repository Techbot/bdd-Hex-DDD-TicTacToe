<?php
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 28/06/2016
 * Time: 12:02
 */

namespace Application;

interface MoveGenerator
{
    /**
     * @param Board $board
     * @return Move
     */
    public function generateMove(Board $board);

}