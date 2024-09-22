<?php

namespace Rslb\Model\Tests\Serialization;

use DateTime;
use Rslb\Model\DeserializerInterface;
use Rslb\Model\ModelInterface;
use Rslb\Model\Tests\TestUser;

class Deserializer implements DeserializerInterface
{

    public static function deserialize(

        string $guid,
        DateTime $createdAt,
        DateTime $updatedAt,
        bool $isDeleted,
        DateTime $deletedAt,
        array $data

    ): ModelInterface
    {


        $user = new TestUser($guid, $createdAt, $isDeleted, $deletedAt);
        $user->setUpdatedAt($updatedAt);
        $user->setFirstname($data['firstname']);

        return $user;

    }
}