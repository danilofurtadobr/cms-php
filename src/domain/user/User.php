<?php

namespace domain\user;

use app\domain\UuidTrait;

class User implements UserInterface
{
    use UuidTrait;

    private $repository;

    private $id;
    private $name;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setName($name): User
    {
        if (empty($name)) {
            $this->name = $name;
        }

        return $this;
    }

    public function load(): User
    {
        return $this->repository->load($this);
    }
}
