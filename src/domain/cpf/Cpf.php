<?php

namespace src\domain\cpf;

use src\domain\utilities\ErrorCodes;
use src\infra\exception\UserException;

class Cpf implements CpfInterface
{
    private const CPF_LENGTH = 11;
    private ?string $cpf;

    public function __construct(?string $number)
    {
        $this->cpf = $number;
    }

    public function validate(): void
    {
        $this->checkOnlyNumbers();
        $this->checkSameNumbers();
        $this->checkVerificationDigits();
    }

    private function checkVerificationDigits()
    {
        for ($position = 9; $position <= 10; $position++) {
            for ($digit = 0, $number = 0; $number < $position; $number++) {
                $digit += $this->cpf[$number] * (($position + 1) - $number);
            }

            $digit = ((10 * $digit) % 11) % 10;

            if ($this->cpf[$number] != $digit) {
                throw new UserException("The digits of the CPF '{$this->cpf}' is invalid.", ErrorCodes::USER_CPF_INVALID);
            }
        }
    }

    private function checkSameNumbers()
    {
        for ($position = 1, $number = $this->cpf[0]; $position <= 10; $position++) {
            if ($number != $this->cpf[$position]) {
                break;
            }

            if ($position == 10) {
                throw new UserException("All characters of CPF '{$this->cpf}' are the same.", ErrorCodes::USER_CPF_INVALID);
            }
        }
    }

    private function checkOnlyNumbers()
    {
        if (!$this->hasOnlyNumbers()) {
            throw new UserException("Number of characters in CPF '{$this->cpf}' is invalid.", ErrorCodes::USER_CPF_INVALID);
        }
    }

    private function hasOnlyNumbers(): bool
    {
        return preg_match('/\d{11}/', $this->cpf);
    }

    // TODO: Descomentar quando for implemetar factory de documento entre CPF e CNPJ
    // public function checkLength()
    // {
    //     if(!$this->isCorrectLength()){
    //         throw new UserException("Number of characters in CPF '{$this->cpf}' is invalid.", ErrorCodes::USER_CPF_INVALID);
    //     }
    // }

    // private function isCorrectLength()
    // {
    //     return mb_strlen($this->cpf) === self::CPF_LENGTH;
    // }

    public function getNumber(): string
    {
        return $this->cpf;
    }
}
