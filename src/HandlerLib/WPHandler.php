<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 11:17
 */


namespace DanchukAS\Crypt\HandlerLib;

use DanchukAS\Crypt\ADataHandler;
use DanchukAS\Crypt\AProcessor;
use DanchukAS\Crypt\IHasProcessor;
use DanchukAS\Crypt\IHasWatchers;

class WPHandler extends ADataHandler implements IHasWatchers, IHasProcessor
{

    /**
     * @var AProcessor
     */
    private $processor;

    /**
     * @var ADataHandler[]
     */
    private $watcherBeforeList;


    /**
     * @var ADataHandler[]
     */
    private $watcherAfterList;


    public function run($data)
    {

        $this->runWatcherList($this->watcherBeforeList, $data);

        $data = $this->processor->run($data);

        $this->runWatcherList($this->watcherAfterList, $data);

        return $data;
    }


    public function setProcessor(AProcessor $processor):void
    {
        $this->processor = $processor;
    }


    /**
     * @param ADataHandler[] $watcherList
     */
    public function setWatcherBeforeList(array $watcherList):void
    {
        $this->watcherBeforeList = $watcherList;
    }


    /**
     * @param ADataHandler[] $watcherList
     */
    public function setWatcherAfterList(array $watcherList):void
    {
        $this->watcherAfterList = $watcherList;
    }


    /**
     * @param ADataHandler[] $watcherList
     * @param mixed $data
     */
    private function runWatcherList(array $watcherList, $data):void
    {
        foreach ($watcherList as $handler) {
            $handler->run($data);
        }
    }

}