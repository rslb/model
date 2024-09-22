<?php

namespace Rslb\Model;

use DateTime;

readonly class ModelUpdated
{

    public function __construct(private string $guid, private string $name, private DateTime $updatedAt)
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

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }





}