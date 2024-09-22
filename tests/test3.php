<?php

use Rslb\Model\Tests\TestFileRepository;
use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";


$repository = new TestFileRepository('repo.txt');

$user = new TestUser('guid1', new DateTime(), true, new DateTime());
$user->setFirstname('Radek');

$repository->save($user);

$obj = $repository->reconstitute('guid1');


if( $user <> $obj) {

    echo 'err';
}