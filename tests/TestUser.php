<?php

namespace Rslb\Model\Tests;

use DateTime;
use Rslb\Model\Model;

class TestUser extends Model
{

    private string $firstname = '';

    public function __construct(string $guid, DateTime $createdAt, bool $isDeleted, ?DateTime $deletedAt)
    {

        parent::__construct($guid, $createdAt, $isDeleted, $deletedAt);
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }



    public function getFirstname(): string
    {
        return $this->firstname;
    }


}