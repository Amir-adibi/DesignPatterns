<?php

require __DIR__ . '/autoload.php';

$file_handler = new FileHandler();
$path = __DIR__ . '/hello.txt';

$file_handler->write($path, 'Hello World!');
var_dump($file_handler->read($path));

$file_handler->writeInBeginning($path, "123");
var_dump($file_handler->read($path));


$cachedFileHandler = new CachedFileHandler($file_handler);

$cachedFileHandler->write($path, 'Hello World!');
var_dump($cachedFileHandler->read($path));

$cachedFileHandler->writeInBeginning($path, "123");
var_dump($cachedFileHandler->read($path));

$cachedFileHandler->append($path, '456');
var_dump($cachedFileHandler->read($path));
