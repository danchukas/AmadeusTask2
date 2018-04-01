<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:55
 */

namespace DanchukAS\Crypt;


interface IHasWatchers
{
    /**
     * @param ADataHandler[] $watcherList
     */
    public function setWatcherAfterList(array $watcherList):void;

    /**
     * @param ADataHandler[] $watcherList
     */
    public function setWatcherBeforeList(array $watcherList):void;

}