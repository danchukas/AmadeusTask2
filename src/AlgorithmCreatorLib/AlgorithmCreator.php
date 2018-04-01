<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:58
 */

namespace DanchukAS\Crypt\AlgorithmCreatorLib;


use DanchukAS\Crypt\IAlgorithm;
use DanchukAS\Crypt\IAlgorithmCreator;

class AlgorithmCreator implements IAlgorithmCreator
{

    public function create(string $name):IAlgorithm
    {
        return new $name;
    }

}