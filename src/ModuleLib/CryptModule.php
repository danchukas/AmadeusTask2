<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:48
 */

namespace DanchukAS\Crypt\ModuleLib;
use DanchukAS\Crypt\ConfigInitializerLib\ConfigInitializer;
use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IDecoder;
use DanchukAS\Crypt\IHasDecoder;
use DanchukAS\Crypt\IModule;


/**
 * Module CryptModule
 *
 * @package DanchukAS\Crypt
 */
class CryptModule implements IModule, IHasDecoder
{
    /**
     * @var IDataHandler
     */
    private static $handler;

    /**
     * @var IDecoder
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