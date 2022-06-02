<?php

namespace domain\user;

class User implements UserInterface
{
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
