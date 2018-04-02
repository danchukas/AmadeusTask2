<?php
declare(strict_types=1);

use DanchukAS\Crypt\AlgorithmLib\Aes256cbc;
use DanchukAS\Crypt\HandlerLib\LogHandler;

$config = [
    (object)[
        'name' => LogHandler::class
    ],
    (object)[
        'name' => Aes256cbc::class
    ],
//    (object)[
//        'name' => Md5::class
//    ],
//    (object)[
//        'name' => Sha1::class
//    ],
    (object)[
        'name' => LogHandler::class
    ]
];

return $config;