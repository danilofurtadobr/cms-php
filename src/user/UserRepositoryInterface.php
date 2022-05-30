<?php

namespace src\user;

interface UserRepositoryInterface
{
    public function load(UserInterface $user): bool;
}