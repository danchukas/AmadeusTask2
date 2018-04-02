<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\AlgorithmLib;

use DanchukAS\Crypt\IData;

class Md5 implements IDataHandler
{
    public function run(IData $data):void
    {
        $handled_data = \var_export($data->getData(), true) . ' hashed by md5';
        $data->setData($handled_data);
    }
}