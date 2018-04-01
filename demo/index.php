<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:30
 */

use DanchukAS\Crypt\ModuleLib\CryptModule;

require_once __DIR__ . '/../vendor/autoload.php';

$string = 'any test data';
echo PHP_EOL . '------- source string ------' . PHP_EOL;
echo PHP_EOL . $string . PHP_EOL;

CryptModule::init();

$handled = CryptModule::encode($string);
echo PHP_EOL . PHP_EOL . '---------- handle ----------' . PHP_EOL;
echo PHP_EOL . $handled . PHP_EOL;

if (CryptModule::isDecodeLastEncodedPossible()) {
    $decode_param = CryptModule::getDecodeDataLastEncoded();
    echo PHP_EOL . PHP_EOL . '------ Data for decode -----' . PHP_EOL;
    echo PHP_EOL . print_r($decode_param, true) . PHP_EOL;
}