<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 18:41
 */

namespace DanchukAS\Crypt;


abstract class IConfigInitializer
{
    abstract public function init($config):void;
    abstract public function getHandler():ADataHandler;
    abstract public function getDecoder():ADecoder;
}