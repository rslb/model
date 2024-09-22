<?php

namespace Rslb\Model;

interface SerializerInterface
{
    public static function serialize(ModelInterface $model):array;
}