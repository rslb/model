<?php

use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";

$data = [

    'guid' => 'guid',
    'firstname' => 'Radek'
];

$obj = TestUser::fromArray($data);

print_r($obj);
