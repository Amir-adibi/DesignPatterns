<?php

class Subscriber implements SplObserver
{
    private string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function update(SplSubject $subject): void
    {
        echo "News from " . $subject->getName() . ' to ' . $this->name . ': '  . $subject->news . "\n";
    }
}
