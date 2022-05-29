<?php

namespace src\user;

class User implements UserInterface
{
    private $repository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }
}
