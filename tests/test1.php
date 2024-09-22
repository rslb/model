<?php

use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";

$createdAt = new DateTime();
$user = new TestUser('guid');
$res = $user->toArray();

if (count($res) <> 2) {

    echo 'err';
}

