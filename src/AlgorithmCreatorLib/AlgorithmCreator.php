<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:58
 */

namespace DanchukAS\Crypt\AlgorithmCreatorLib;


use DanchukAS\Crypt\AAlgorithm;
use DanchukAS\Crypt\AAlgorithmCreator;

class AlgorithmCreator extends AAlgorithmCreator
{

    public function create(string $name):AAlgorithm
    {
        return new $name;
    }

}