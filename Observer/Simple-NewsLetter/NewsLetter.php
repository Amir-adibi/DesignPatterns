<?php

class NewsLetter implements SplSubject
{
    public SplObjectStorage $observers;
    public string $name;
    public string $news = '';

    public function __construct(string $name)
    {
        $this->observers = new SplObjectStorage();
        $this->name = $name;
    }

    public function attach(SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function changeName($name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function sendNews($news)
    {
        $this->news = $news;

        echo 'News from: ' . $this->name;
        echo "\n";
        $this->notify();
    }
}

