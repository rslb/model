<?php

namespace Rslb\Model\Tests\Serialization;

use Rslb\Model\ModelInterface;
use Rslb\Model\Tests\TestUser;

class Deserializer
{

    public static function deserialize(array $data):ModelInterface
    {
       return new TestUser($data['guid'], $data['firstname']);
    }
}