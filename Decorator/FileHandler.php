<?php

class FileHandler implements FileHandlerInterface
{
    public function read(string $path): string|bool
    {
        if (!is_file($path)){
            return false;
        }

        return file_get_contents($path);
    }

    public function write(string $path, string $content): void
    {
        file_put_contents($path, $content);
    }

    public function append(string $path, string $content): void
    {
        file_put_contents($path, $content, FILE_APPEND);
    }

    public function writeInBeginning(string $path, string $content): void
    {
        file_put_contents($path, $content . $this->read($path));
    }
}