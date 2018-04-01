<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\AlgorithmLib;

use DanchukAS\Crypt\AAlgorithm;

class Md5 extends AAlgorithm
{
    public function run($data) {
        return \var_export($data, true) . ' hashed by md5';
    }
}