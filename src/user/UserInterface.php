<?php

namespace src\user;

interface UserInterface
{
    public function getId(): string;
    public function setName(): UserInterface;
    public function load(): UserInterface;
}
