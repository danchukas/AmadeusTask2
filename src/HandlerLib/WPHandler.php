<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 11:17
 */


namespace DanchukAS\Crypt\HandlerLib;

use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IProcessor;
use DanchukAS\Crypt\IHasProcessor;
use DanchukAS\Crypt\IHasWatchers;

class WPHandler implements IDataHandler, IHasWatchers, IHasProcessor
{

    /**
     * @var IProcessor
     */
    private $processor;

    /**
     * @var IDataHandler[]
     */
    private $watcherBeforeList;


    /**
     * @var IDataHandler[]
     */
    private $watcherAfterList;


    public function run($data)
    {

        $this->runWatcherList($this->watcherBeforeList, $data);

        $data = $this->processor->run($data);

        $this->runWatcherList($this->watcherAfterList, $data);

        return $data;
    }


    public function setProcessor(IProcessor $processor):void
    {
        $this->processor = $processor;
    }


    /**
     * @param IDataHandler[] $watcherList
     */
    public function setWatcherBeforeList(array $watcherList):void
    {
        $this->watcherBeforeList = $watcherList;
    }


    /**
     * @param IDataHandler[] $watcherList
     */
    public function setWatcherAfterList(array $watcherList):void
    {
        $this->watcherAfterList = $watcherList;
    }


    /**
     * @param IDataHandler[] $watcherList
     * @param mixed $data
     */
    private function runWatcherList(array $watcherList, $data):void
    {
        foreach ($watcherList as $handler) {
            $handler->run($data);
        }
    }

}