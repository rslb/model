<?php

namespace Rslb\Model;

use DateTime;

readonly class ModelCreated
{

    public function __construct(private string $guid, private string $name, private DateTime $createdAt)
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

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }





}