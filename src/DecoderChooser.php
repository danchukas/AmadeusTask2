<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-31 12:17
 */

namespace DanchukAS\Crypt;


use DanchukAS\Crypt\DecoderLib\LiveDecoder;

class DecoderChooser implements IChooseDecoderByEncoder
{
    public function byEncoder($encoder):ADecoder
    {
        // now accessed only 1 type decoder for all encoders
        return $this->getReversedCoder($encoder);
    }


    private function getReversedCoder($coder):ADecoder
    {
        $reversed_coder = new LiveDecoder();

        $reversed_coder->setEncoder($coder);

        return $reversed_coder;
    }
}