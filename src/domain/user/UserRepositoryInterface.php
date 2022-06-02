<?php

namespace domain\user;

interface UserRepositoryInterface
{
    public function load(UserInterface $user): UserInterface;
}