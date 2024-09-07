<?php

use Rslb\Model\Tests\TestFileRepository;
use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";


$repository = new TestFileRepository('repo.txt');
$repository->save(new TestUser('test', 'Grzesiak'));