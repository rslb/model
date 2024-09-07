<?php

use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";

$user = new TestUser('guid', 'Radek');
$res = $user->toArray();

