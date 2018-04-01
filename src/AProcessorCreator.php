<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 13:02
 */

namespace DanchukAS\Crypt;


abstract class AProcessorCreator
{
    abstract public function create(string $name);
}