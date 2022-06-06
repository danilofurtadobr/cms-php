<?php

namespace src\domain\cpf;

interface CpfInterface
{
    public function getNumber(): ?string;
    public function validate(): void;
}
