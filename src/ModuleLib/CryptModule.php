<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:48
 */

namespace DanchukAS\Crypt\ModuleLib;
use DanchukAS\Crypt\ADataHandler;
use DanchukAS\Crypt\AModule;
use DanchukAS\Crypt\ConfigInitializer;
use DanchukAS\Crypt\ADecoder;
use DanchukAS\Crypt\DecoderChooser;
use DanchukAS\Crypt\IHasDecoder;


/**
 * Module CryptModule
 *
 * @package DanchukAS\Crypt
 */
class CryptModule extends AModule implements IHasDecoder
{
    /**
     * @var ADataHandler
     */
    private static $handler;

    /**
     * @var ADecoder
     */
    private static $decoder;


    public static function init()
    {
        $config = include 'config.php';

        $conf_initializer = new ConfigInitializer();
        $conf_initializer->init($config);

        self::$handler = $conf_initializer->getHandler();

        self::$decoder = $conf_initializer->getDecoder();
    }


    public static function encode($string)
    {
        return self::$handler->run($string);
    }


    public static function getDecodeDataLastEncoded()
    {
        return self::$decoder->getDecodeParam();
    }


    public static function isDecodeLastEncodedPossible():bool
    {
        return self::$decoder->isDecodePossible();
    }

}