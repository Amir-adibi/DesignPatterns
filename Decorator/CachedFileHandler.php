<?php

class CachedFileHandler implements FileHandlerInterface
{
    private array $cache = [];

    public function __construct(private FileHandler $handler)
    {

    }
    public function read(string $path): string|bool
    {
        $content = $this->cache[$path] ?? $this->handler->read($path);

        if ($content !== false)
            $this->cache[$path] = $content;

        return $content;
    }

    public function write(string $path, string $content): void
    {
        $this->handler->write($path, $content);
        $this->cache[$path] = $content;
    }

    public function append(string $path, string $content): void
    {
        $oldContent = $this->read($path);
        $this->handler->append($path, $content);
        $this->cache[$path] = $oldContent . $content;
    }

    public function writeInBeginning(string $path, string $content): void
    {
        $oldContent = $this->read($path);
        $this->handler->writeInBeginning($path, $content);
        $this->cache[$path] = $content . $oldContent;
    }
}