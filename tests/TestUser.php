<?php

namespace Rslb\Model\Tests;

use Rslb\Model\Model;
use Rslb\Model\ModelInterface;

class TestUser extends Model
{

    public function __construct(string $guid, private readonly string $firstname)
    {
        parent::__construct($guid);
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }


}