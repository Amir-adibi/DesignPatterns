<?php

interface FileHandlerInterface
{
    public function read(string $path): string|bool;

    public function write(string $path, string $content): void;

    public function append(string $path, string $content): void;

    public function writeInBeginning(string $path, string $content): void;
}