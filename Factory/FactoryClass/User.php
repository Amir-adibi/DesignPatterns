<?php

class User
{
    private bool $isAdmin;
    public function __construct(
        private string $username
    )
    {
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }
}