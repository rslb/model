<?php

use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";


$user = new TestUser('guid1', new DateTime(), true, new DateTime());
$user->setFirstname('Radek');

$data = $user->toArray();

$obj = TestUser::fromArray($data);

