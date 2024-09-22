<?php

namespace Rslb\Model;

use DateTime;

readonly class ModelDeleted
{

    public function __construct(private string $guid, private string $name, private DateTime $deletedAt)
    {
    }


    public function getGuid(): string
    {
        return $this->guid;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }





}