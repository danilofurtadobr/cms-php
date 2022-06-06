<?php

namespace src\infra\dm;

use src\domain\user\UserRepositoryInterface;

class UserDm implements UserRepositoryInterface
{
    public function findByCpf(UserInterface $user): bool
    {
        return true;
    }

}
