<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt;

interface IHasDecodeParamForLastEncode
{
    public function getDecodeDataLastEncoded();
    public function isDecodePossible():bool;
}