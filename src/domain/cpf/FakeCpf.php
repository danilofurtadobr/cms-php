<?php

namespace src\domain\cpf;

class FakeCpf implements CpfInterface
{

    public function __construct(?string $number)
    {
        $this->cpf = $number;
    }

    public function validate(): void
    {
    }

    public function getNumber(): string
    {
        return 'str';
    }
}
