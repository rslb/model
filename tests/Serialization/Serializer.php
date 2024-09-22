<?php

namespace Rslb\Model\Tests\Serialization;

use Rslb\Model\ModelInterface;
use Rslb\Model\SerializerInterface;
use Rslb\Model\Tests\TestUser;

class Serializer implements SerializerInterface
{

    /**
     * @param TestUser $model
     * @return array
     */
    public static function serialize(ModelInterface $model):array
    {

        return [

            'firstname' => $model->getFirstname()
        ];
    }
}