<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 11:17
 */


namespace DanchukAS\Crypt\HandlerLib;

use DanchukAS\Crypt\IData;
use DanchukAS\Crypt\IDataHandler;

class CascadeHandler implements IDataHandler
{

    /**
     * @var IDataHandler[]
     */
    private $handlerList;


    public function run(IData $data):void
    {
        foreach ($this->handlerList as $handler) {
            $handler->run($data);
        }
    }


    /**
     * @param IDataHandler[] $watcherList
     */
    public function setHandlerList(array $watcherList):void
    {
        $this->handlerList = $watcherList;
    }

}