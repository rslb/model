<?php

namespace Rslb\Model;

use DateTime;

readonly class ModelUpdated
{

    public function __construct(private string $conversationId, private string $name, private DateTime $updatedAt)
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

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }





}