<?php

namespace Rslb\Model\Tests\Serialization;

use Rslb\Model\ModelInterface;
use Rslb\Model\Tests\TestUser;

class Serializer
{

    public static function serialize(TestUser $model):array
    {
        return [

            'guid' => $model->getGuid(),
            'firstname' => $model->getFirstname()
        ];
    }
}