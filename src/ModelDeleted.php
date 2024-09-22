<?php

namespace Rslb\Model;

use DateTime;

readonly class ModelDeleted
{

    public function __construct(private string $conversationId, private string $name, private DateTime $deletedAt)
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

    public function getDeletedAt(): DateTime
    {
        return $this->deletedAt;
    }





}