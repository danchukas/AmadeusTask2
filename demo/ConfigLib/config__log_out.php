<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 11:46
 */


use DanchukAS\Crypt\AlgorithmLib\Md5;
use DanchukAS\Crypt\AlgorithmLib\Sha1;
use DanchukAS\Crypt\HandlerLib\LogHandler;
use DanchukAS\Crypt\ProcessorLib\LinearEncoder;

$config = (object)[
    'watcherList' => [
        (object)[
            'name' => LogHandler::class,
            'activation' => (object)[
                'after' => true
            ]
        ]
    ],
    'encoder' => (object)[
        'name' => LinearEncoder::class,
        'param' => [
            (object)[
                'name' => Md5::class
            ],
            (object)[
                'name' => Sha1::class
            ]
        ]
    ]
];

return $config;