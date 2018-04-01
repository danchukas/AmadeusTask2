<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 13:02
 */

namespace DanchukAS\Crypt;


interface IProcessorCreator
{
    public function create(string $name);
}