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
use DanchukAS\Crypt\HandlerLib\WPHandler;
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


    /**
     * @var IDecoder
     */
    private $decoder;


    public function init($config):void
    {
        $processor_creator = new ProcessorCreator();
        $processor = $processor_creator->create($config->encoder->name);

        $algorithm_list = $this->initEncoderParam($config->encoder->param);
        $processor->setAlgorithmList($algorithm_list);

        $handler_creator = new HandlerCreator();

        $watcher_list = $this->initHandlerList($config->watcherList, $handler_creator);

        $this->handler = $handler_creator->build(
            WPHandler::class,
            $processor,
            $watcher_list->before,
            $watcher_list->after
        );

        $decoder_chooser = new DecoderChooser();
        $this->decoder = $decoder_chooser->byEncoder($processor);
    }


    public function getHandler():IDataHandler
    {
        return $this->handler;
    }


    public function getDecoder():IDecoder
    {
        return $this->decoder;
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


    private function initEncoderParam(array $param) {

        $algorithm_list = [];
        $algorithm_creator = new AlgorithmCreator();
        foreach ($param as $algorithm) {
            $algorithm_list[] = $algorithm_creator->create($algorithm->name);
        }

        return $algorithm_list;
    }

}