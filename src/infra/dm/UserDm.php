<?php

namespace src\infra\dm;

use src\domain\user\UserInterface;
use src\domain\user\UserRepositoryInterface;

   class UserDm implements UserRepositoryInterface
{
    public function findByCpf(UserInterface $user): bool
    {
        if ($user->getId() === '15de1f6f-befd-429c-8a4b-add21360a810') {
            return false;
        }

        return true;
    }


}
