<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:55
 */

namespace DanchukAS\Crypt;


interface IHasProcessor
{
    public function setProcessor(AProcessor $processor):void;
}