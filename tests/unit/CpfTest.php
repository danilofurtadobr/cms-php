<?php

use PHPUnit\Framework\TestCase;
use src\domain\cpf\Cpf;

class CpfTest extends TestCase
{
    public function testValidateNumberOfCharacters()
    {
        $cpf = (new Cpf('1628334509'));

        $this->expectException(Exception::class);                                                       
        $this->expectExceptionCode(4001);
        $this->expectExceptionMessage("Number of characters in CPF '1628334509' is invalid.");

        $cpf->validate();
    }

    public function testAllCharactersAreSame()
    {
        $cpf = (new Cpf('11111111111'));

        $this->expectException(Exception::class);
        $this->expectExceptionCode(4001);
        $this->expectExceptionMessage("All characters of CPF '11111111111' are the same.");

        $cpf->validate();
    }

    public function testInvalidDigitsTheCpf()
    {
        $cpf = (new Cpf('16283345090'));

        $this->expectException(Exception::class);
        $this->expectExceptionCode(4001);
        $this->expectExceptionMessage("The digits of the CPF '16283345090' is invalid.");

        $cpf->validate();
    }
}
