<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 11:46
 */


use DanchukAS\Crypt\AlgorithmLib\Aes256cbc;
use DanchukAS\Crypt\HandlerLib\LogHandler;
use DanchukAS\Crypt\ProcessorLib\LinearEncoder;

$config = (object)[
    (object)[
        'name' => LogHandler::class
    ],
    (object)[
        'name' => Aes256cbc::class
    ],
    (object)[
        'name' => Aes256cbc::class
    ],
    (object)[
        'name' => Aes256cbc::class
    ],
    (object)[
        'name' => LogHandler::class
    ]
];

return $config;