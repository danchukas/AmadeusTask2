<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:30
 */


//Создать модуль(класс или иерархию классов), который будет служить сервисом для преобразования строкового аргумента.
//Его функциональность:
//
//Реализовывать процессинг
//1. Возможность захешировать и вернуть строку алгоритмом md5($arg));
//2. Возможность захешировать и вернуть строку алгоритмом md5(md5($arg));
//3. Возможность захешировать и вернуть строку алгоритмом sha1($arg));
//4. Возможность захешировать и вернуть строку алгоритмом md5(sha1($arg)));
//5. Возможность зашифровать и вернуть строку, а также параметры необходимые для дальнейшей дешифровки алгоритмом aes-256-cbc;
//
//------
//Функционировать по правилам:
//
//1. Какой именно процессинг будет использован, должно зависеть от конфига (файл в корне проекта. Можно include config.php, чтобы не связываться с парсингом.)
//2. Логгировать входные данные, выходные данные, либо оба набора данных, независимо от процессинга. (должно зависеть от конфига, можно писать в строку или буфер и никуда не сохранять)
//
//
//---------------------
//Это задача на дизайн кода и владение ООП, а не на знание языка и хакинг. Допускаются пустые методы и реализации. Главное дизайн.
//Необходимо написать код когерентный SOLID, DRY. Low coupled, highly cohesive.


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