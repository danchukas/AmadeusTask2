<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\AlgorithmLib;

use DanchukAS\Crypt\IAlgorithm;

class Md5 implements IAlgorithm
{
    public function run($data) {
        return \var_export($data, true) . ' hashed by md5';
    }
}