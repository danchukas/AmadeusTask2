<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:48
 */

namespace DanchukAS\Crypt\ModuleLib;
use DanchukAS\Crypt\ConfigInitializerLib\ConfigInitializer;
use DanchukAS\Crypt\Data;
use DanchukAS\Crypt\IData;
use DanchukAS\Crypt\IDataHandler;
use DanchukAS\Crypt\IDecoder;
use DanchukAS\Crypt\IHasDecodeParam;
use DanchukAS\Crypt\IHasDecodeParamForLastEncode;
use DanchukAS\Crypt\IHasDecoder;
use DanchukAS\Crypt\IModule;


/**
 * Module CryptModule
 *
 * @package DanchukAS\Crypt
 */
class CryptModule implements IModule, IHasDecodeParamForLastEncode
{
    /**
     * @var IDataHandler
     */
    private static $handler;


    /**
     * @var IData|IHasDecodeParam
     */
    private static $data;

    public static function init()
    {
        $config = include 'config.php';

        $conf_initializer = new ConfigInitializer();
        $conf_initializer->init($config);

        self::$handler = $conf_initializer->getHandler();
    }


    public static function encode($string)
    {
        self::$data = new Data();
        self::$data->setData($string);

        self::$handler->run(self::$data);

        return self::$data->getData();
    }


    public static function getDecodeDataLastEncoded()
    {
        return self::$data->getDecodeParam();
    }


}