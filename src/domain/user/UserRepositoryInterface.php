<?php

namespace src\domain\user;

interface UserRepositoryInterface
{
    public function findByCpf(UserInterface $user): bool;
}