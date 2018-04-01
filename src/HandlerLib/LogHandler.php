<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 15:54
 */

namespace DanchukAS\Crypt\HandlerLib;


use DanchukAS\Crypt\IDataHandler;

class LogHandler implements IDataHandler
{
    public function run($data)
    {
        echo 'Logged: ' . \print_r($data, true) . \PHP_EOL;
    }
}