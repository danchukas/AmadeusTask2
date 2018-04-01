<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 20:32
 */

namespace DanchukAS\Crypt;


abstract class ADataHandler
{
    abstract public function run($data);
}