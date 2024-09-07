<?php

namespace Rslb\Model;

interface ModelInterface
{

    public function toArray():array;

    public static function fromArray(array $data):ModelInterface;
}