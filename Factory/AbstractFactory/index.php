<?php

require __DIR__ . '/autoload.php';

$factory = new NormalUserFactory();
$user = $factory->make('test', false);

var_dump($user->getUsername());
var_dump($user->isAdmin());

// test

$testSuite = new UsersTest($factory);
var_dump($testSuite->runTests());
