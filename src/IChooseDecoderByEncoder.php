<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-01 20:15
 */

namespace DanchukAS\Crypt;


interface IChooseDecoderByEncoder
{
    public function byEncoder($encoder):IDecoder;
}