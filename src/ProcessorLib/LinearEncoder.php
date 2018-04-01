<?php
declare(strict_types=1);

/**
 * Created by PhpStorm.
 * User: danchukas
 * Date: 2018-03-30 10:40
 */

namespace DanchukAS\Crypt\ProcessorLib;

use DanchukAS\Crypt\IDecodableAlgorithm;
use DanchukAS\Crypt\IAlgorithm;
use DanchukAS\Crypt\IHasDecodeParamForLastEncode;
use DanchukAS\Crypt\IProcessor;

class LinearEncoder implements IProcessor, IHasDecodeParamForLastEncode
{

    private $decodeDataLastEncoded;

    private $decodePossibility;

    private $algorithmList;

    public function run($data)
    {

        $this->decodeDataLastEncoded = null;
        $this->decodePossibility = false;

        // Another - if process will have runtime error - data for decode will wrong.
        $decode_data = [];
        $decode_possible = true;

        foreach ($this->algorithmList as $algorithm) {
            /** @var IAlgorithm $algorithm */
            $data = $algorithm->run($data);

            if (!$decode_possible) {
                continue;
            }

            if (!($algorithm instanceof IDecodableAlgorithm)) {
                $decode_possible = false;
                $decode_data = null;
                continue;
            }

            $decode_data[] = $algorithm->getDecodeDataLastEncoded();
        }

        if ($decode_possible) {

            if (!empty($decode_data)) {
                $this->decodeDataLastEncoded = $decode_data;
            }

            $this->decodePossibility = true;
        }

        return $data;
    }

    public function getDecodeDataLastEncoded()
    {
        if (!$this->isDecodePossible()) {
            // @todo: replace with custom named Exception
            throw new \LogicException('decode not possible. Use method IsDecodePossible to check before.');
        }

        return $this->decodeDataLastEncoded;
    }

    public function isDecodePossible():bool
    {
        if (null === $this->decodePossibility) {
            // @todo: replace with custom named Exception
            throw new \LogicException('Nothing is encoded yet.');
        }

        return $this->decodePossibility;
    }

    public function getAlgorithmList():array
    {
        return $this->algorithmList;
    }

    public function setAlgorithmList(array $algorithmList)
    {
        $this->algorithmList = $algorithmList;
    }
}