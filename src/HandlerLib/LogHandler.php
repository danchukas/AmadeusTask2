<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 15:54
 */

namespace DanchukAS\Crypt\HandlerLib;


use DanchukAS\Crypt\IData;
use DanchukAS\Crypt\IDataHandler;

class LogHandler implements IDataHandler
{
    public function run(IData $data):void
    {
        echo 'Logged: ' . \print_r($data->getData(), true) . \PHP_EOL;
    }
}