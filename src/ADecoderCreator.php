<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 12:02
 */

namespace DanchukAS\Crypt;


abstract class ADecoderCreator
{
    abstract public function build($name):ADecoder;
}