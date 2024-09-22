<?php

use Rslb\Model\Tests\TestFileRepository;
use Rslb\Model\Tests\TestUser;

require_once "../vendor/autoload.php";


$repository = new TestFileRepository('repo.txt');

$user = new TestUser('guid1');
$user->setFirstname('Radek');
$user->releaseEvents();

$repository->save($user);

$obj = $repository->reconstitute('guid1');

//print_r($user);
//print_r($obj);
//
//die;


if( $user <> $obj) {

    echo 'err';
}