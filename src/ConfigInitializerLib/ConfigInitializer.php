<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 11:40
 */

namespace DanchukAS\Crypt\ConfigInitializerLib;

use DanchukAS\Crypt\HandlerCreatorLib\HandlerCreator;
use DanchukAS\Crypt\HandlerLib\CascadeHandler;
use DanchukAS\Crypt\IConfigInitializer;
use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IHandlerCreator;

class ConfigInitializer implements IConfigInitializer
{

    /**
     * @var IDataHandler
     */
    private $handler;


    public function init($config):void
    {
        $handler_creator = new HandlerCreator();

        $handler = $handler_creator->build(
            CascadeHandler::class,
            true
        );

        $handler_list = $this->initHandlerList($config, $handler_creator);

        $handler->setHandlerList($handler_list);

        $this->handler = $handler;
    }


    public function getHandler():IDataHandler
    {
        return $this->handler;
    }


    private function initHandlerList(array $config, IHandlerCreator $handler_creator)
    {
        $handler_list = [];

        foreach ($config as $handler) {

            $handler_list[] = $handler_creator->build($handler->name);
        }

        return $handler_list;
    }
}