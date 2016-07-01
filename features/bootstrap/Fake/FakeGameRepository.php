<?php
namespace Fake;
/**
 * Created by PhpStorm.
 * User: rob
 * Date: 23/06/2016
 * Time: 10:08
 */
class FakeGameRepository
{
    private $games;

    public function __construct(array $games)
    {
        $this->games = $games;
    }

}