<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:53
 */

namespace DanchukAS\Crypt;


abstract class AAlgorithm
{
    abstract public function run($data);
}