<?php

namespace Rslb\Model;

use DateTime;

readonly class ModelCreated
{

    public function __construct(private string $conversationId, private string $name, private DateTime $createdAt)
    {
    }

    public function getConversationId(): string
    {
        return $this->conversationId;
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