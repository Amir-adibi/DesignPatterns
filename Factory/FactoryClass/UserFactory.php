<?php

class UserFactory
{
    public static function make(string $username, bool $isAdmin): User
    {
        $user = new User($username);
        $user->setAdmin($isAdmin);

        return $user;
    }
}