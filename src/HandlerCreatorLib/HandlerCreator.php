<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 12:17
 */

namespace DanchukAS\Crypt\HandlerCreatorLib;


use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IHandlerCreator;
use DanchukAS\Crypt\IHasProcessor;
use DanchukAS\Crypt\IHasWatchers;

class HandlerCreator implements IHandlerCreator
{
    public function build($name, $saveDecodeParam = null):IDataHandler
    {
        $handler = new $name();

        if (true === $saveDecodeParam && $handler instanceof ISaveDecodeParam) {
            $handler->enableSaverDecodeParam();
        }

        return $handler;
    }
}