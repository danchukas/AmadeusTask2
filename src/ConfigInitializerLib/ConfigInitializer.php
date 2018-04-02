<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 11:40
 */

namespace DanchukAS\Crypt\ConfigInitializerLib;

use DanchukAS\Crypt\AlgorithmCreatorLib\AlgorithmCreator;
use DanchukAS\Crypt\DecoderChooser;
use DanchukAS\Crypt\HandlerCreatorLib\HandlerCreator;
use DanchukAS\Crypt\HandlerLib\CascadeHandler;
use DanchukAS\Crypt\IConfigInitializer;
use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IDecoder;
use DanchukAS\Crypt\IHandlerCreator;
use DanchukAS\Crypt\ProcessorCreatorLib\ProcessorCreator;

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

        $algorithm_list = $this->initAlgorithmList($config->encoderList);


        $watcher_list = $this->initHandlerList($config->watcherList, $handler_creator);

        $handler_list = \array_merge($watcher_list->before, $algorithm_list, $watcher_list->after);

        $handler->setHandlerList($handler_list);

        $this->handler = $handler;
    }


    public function getHandler():IDataHandler
    {
        return $this->handler;
    }


    private function initHandlerList(array $config, IHandlerCreator $handler_creator)
    {
        $handler_list = new \stdClass();
        $handler_list->before = [];
        $handler_list->after = [];

        foreach ($config as $handler) {

            $instance = $handler_creator->build($handler->name);

            if (!empty($handler->activation->before)) {
                $handler_list->before[] = $instance;
            }

            if (!empty($handler->activation->after)) {
                $handler_list->after[] = $instance;
            }
        }

        return $handler_list;
    }


    private function initAlgorithmList(array $param) {

        $handler_creator = new AlgorithmCreator();

        $algorithm_list = [];

        foreach ($param as $algorithm) {
            $algorithm_list[] = $handler_creator->create($algorithm->name);
        }

        return $algorithm_list;
    }

}