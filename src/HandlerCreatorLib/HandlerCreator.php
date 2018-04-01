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
    public function build($name, $processor=null, $watcherBeforeList = null, $watcherAfterList = null):IDataHandler
    {
        $handler = new $name();

        if (null!== $processor && $handler instanceof IHasProcessor) {
            $handler->setProcessor($processor);
        }

        if (null!== $watcherBeforeList && $handler instanceof IHasWatchers) {
            $handler->setWatcherBeforeList($watcherBeforeList);
        }

        if (null!== $watcherAfterList && $handler instanceof IHasWatchers) {
            $handler->setWatcherAfterList($watcherAfterList);
        }

        return $handler;
    }
}