<?php

class AllAdminUserFactory implements UserFactory
{
    public function make(string $username, bool $isAdmin): User
    {
        $user = new User($username);
        $user->setAdmin(true);

        return $user;
    }
}