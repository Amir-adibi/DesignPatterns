<?php

//require __DIR__ . '/autoload.php';
require 'User.php';
require 'UserFactory.php';

$user = new User('not_admin', false);
$user2 = UserFactory::make('admin2', true);

var_dump($user->getUsername());
var_dump($user2->isAdmin());



