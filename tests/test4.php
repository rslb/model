<?php

use Rslb\Model\Tests\TestFileRepository;
use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";


$repository = new TestFileRepository('repo.txt');

$user = new TestUser('test', 'Radek');
$repository->save($user);

$res = $repository->reconstitute('test');

print_r($res);