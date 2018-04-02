<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\AlgorithmLib;

use DanchukAS\Crypt\IData;
use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IHasDecodeParam;


class Aes256cbc implements IDataHandler
{

    public function run(IData $data):void
    {
        $handled_data = \var_export($data->getData(), true) . ' encrypted by Aes256cbc';
        $data->setData($handled_data);

        $data_for_decode = (object)[
            'algorithm' => 'Aes256cbc',
            'salt' => \random_int(0, 99)
        ];

        if ($data instanceof IHasDecodeParam) {
            $data->addDecodeParam($data_for_decode);
        }
    }
}