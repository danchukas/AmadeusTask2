<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:02
 */

namespace DanchukAS\Crypt;


interface IHandlerCreator
{
    public function build($name): IDataHandler;
}