<?php

namespace src\domain\user;

use src\domain\cpf\CpfInterface;

interface UserInterface
{
    public function setId(string $id);
    public function getId(): string;
    public function setName($name): UserInterface;
    public function loadByCpf(): UserInterface;
    public function getCpf(): CpfInterface;
    public function setCpf(CpfInterface $cpf): UserInterface;
    public function setPassword(?string $password): UserInterface;
    public function checkPassword(string $password): User;
}
