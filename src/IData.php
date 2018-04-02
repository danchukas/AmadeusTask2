<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-04-02 10:07
 */

namespace DanchukAS\Crypt;


interface IData
{
    public function getData();
    public function setData($data):void;
}