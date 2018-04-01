<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:58
 */

namespace DanchukAS\Crypt\ProcessorCreatorLib;


use DanchukAS\Crypt\AProcessor;
use DanchukAS\Crypt\AProcessorCreator;

class ProcessorCreator extends AProcessorCreator
{

    public function create(string $name):AProcessor
    {
        return new $name;
    }

}