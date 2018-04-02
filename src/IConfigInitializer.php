<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 18:41
 */

namespace DanchukAS\Crypt;


interface IConfigInitializer
{
    public function init($config):void;
    public function getHandler():IDataHandler;
}