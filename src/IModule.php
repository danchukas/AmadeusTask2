<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:43
 */

namespace DanchukAS\Crypt;


interface IModule
{
    public static function encode($data);
}