<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\AlgorithmLib;

use DanchukAS\Crypt\IAlgorithm;
use DanchukAS\Crypt\IDecodableAlgorithm;

class Aes256cbc implements IAlgorithm, IDecodableAlgorithm
{
    private $dataForDecode;

    public function run($data)
    {
        $data = \var_export($data, true) . ' encrypted by Aes256cbc';

        $this->dataForDecode = (object)[
            'algorithm' => 'Aes256cbc',
            'salt' => \random_int(0, 99)
        ];

        return $data;
    }

    public function getDecodeDataLastEncoded()
    {
        return $this->dataForDecode;
    }
}