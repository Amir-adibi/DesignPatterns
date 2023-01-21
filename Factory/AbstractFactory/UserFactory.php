<?php

interface UserFactory
{
    public function make(string $username, bool $isAdmin): User;
}

