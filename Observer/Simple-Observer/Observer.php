<?php

// Example implementation of Observer design pattern:

class MyObserver1 implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo __CLASS__ . ' - ' . $subject->getName();
    }
}

class MyObserver2 implements SplObserver
{
    public function update(SplSubject $subject): void
    {
        echo __CLASS__ . ' - ' . $subject->getName();
    }
}

class MySubject implements SplSubject
{
    private SplObjectStorage $_observers;
    private string $_name;

    public function __construct(string $name)
    {
        $this->_observers = new SplObjectStorage();
        $this->_name = $name;
    }

    public function attach(SplObserver $observer): void
    {
        $this->_observers->attach($observer);
    }

    public function detach(SplObserver $observer): void
    {
        $this->_observers->detach($observer);
    }

    public function notify(): void
    {
        foreach ($this->_observers as $observer) {
            $observer->update($this);
        }
    }

    public function getName(): string
    {
        return $this->_name;
    }
}

$observer1 = new MyObserver1();
$observer2 = new MyObserver2();

$subject = new MySubject("test");

$subject->attach($observer1);
$subject->attach($observer2);
$subject->notify();

/*
will output:

MyObserver1 - test
MyObserver2 - test
*/

$subject->detach($observer2);
$subject->notify();

/*
will output:

MyObserver1 - test
*/
