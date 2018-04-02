<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-02 10:05
 */

namespace DanchukAS\Crypt;


class Data implements IData, IHasDecodeParam
{
    private $data;

    private $decodeParam;

    public function __construct()
    {
        $this->decodeParam = [];
    }

    public function getData()
    {
        return $this->data;
    }
    public function setData($data):void
    {
        $this->data = $data;
    }

    public function getDecodeParam()
    {
        return $this->decodeParam;
    }

    public function addDecodeParam($param):void
    {
        $this->decodeParam[] = $param;
    }

}