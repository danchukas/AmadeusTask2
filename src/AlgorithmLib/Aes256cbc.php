<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\AlgorithmLib;

use DanchukAS\Crypt\IAlgorithm;
use DanchukAS\Crypt\IData;


class Aes256cbc implements IAlgorithm
{
    public function run(IData $data):void
    {
        $handled_data = \var_export($data->getData(), true) . ' encrypted by Aes256cbc';
        $data->setData($handled_data);

        $data_for_decode = (object)[
            'algorithm' => 'Aes256cbc',
            'salt' => \random_int(0, 99)
        ];

        $data->addDecodeParam($data_for_decode);
    }
}