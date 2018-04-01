<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:58
 */

namespace DanchukAS\Crypt\ProcessorCreatorLib;


use DanchukAS\Crypt\IProcessor;
use DanchukAS\Crypt\IProcessorCreator;

class ProcessorCreator implements IProcessorCreator
{

    public function create(string $name):IProcessor
    {
        return new $name;
    }

}