<?php

class UsersTest
{
    public function __construct(private UserFactory $factory)
    {
    }

    public function runTests(): bool
    {
        $users = [];
        for ($i = 0; $i < 1000; $i++) {
            $users[] = $this->factory->make('smaple', true);
        }
        for ($i = 0; $i < 1000; $i++) {
            $users[] = $this->factory->make('smaple', false);
        }

        for ($i = 0; $i < 1000; $i++) {
            if (!$users[$i]->isAdmin())
                return false;
        }

        for ($i = 1000; $i < 2000; $i++){
            if ($users[$i]->isAdmin()){
                return false;
            }
        }
        return true;
    }
}
