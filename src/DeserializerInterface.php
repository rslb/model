<?php

namespace Rslb\Model;

use DateTime;

interface DeserializerInterface
{

    public static function deserialize(

        string   $guid,
        DateTime $createdAt,
        DateTime $updatedAt,
        bool     $isDeleted,
        ?DateTime $deletedAt,
        array    $data,

    ): ModelInterface;
}