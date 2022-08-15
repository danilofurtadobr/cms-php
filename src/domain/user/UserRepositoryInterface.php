<?php

namespace src\domain\user;

interface UserRepositoryInterface
{
    public function findByCpf(UserInterface $user): bool;
    public function findByEmail(UserInterface $user): bool;
}
