<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 15:10
 */

namespace DanchukAS\Crypt\DecoderLib;


use DanchukAS\Crypt\IDecoder;
use DanchukAS\Crypt\IHasDecodeParamForLastEncode;
use DanchukAS\Crypt\IHasEncoder;

class LiveDecoder implements IDecoder, IHasEncoder
{
    /**
     * @var IHasDecodeParamForLastEncode
     */
    private $encoder;

    public function setEncoder(IHasDecodeParamForLastEncode $encoder) {
        $this->encoder = $encoder;
    }


    public function getDecodeParam()
    {
        return $this->encoder->getDecodeDataLastEncoded();
    }

    public function isDecodePossible():bool
    {
        return $this->encoder->isDecodePossible();
    }
}