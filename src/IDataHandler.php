<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 20:32
 */

namespace DanchukAS\Crypt;


interface IDataHandler
{
    public function run(IData $data):void;
}