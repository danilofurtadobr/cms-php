<?php
// Inclusão do framework PHPUnit
use PHPUnit\Framework\TestCase;
use src\domain\cpf\Cpf;
use src\domain\cpf\FakeCpf;
use src\domain\user\User;
use src\infra\dm\UserDm;
use src\infra\exception\UserException;

class UserTest extends TestCase
{
    public function testIncorrectPassword()
    {
        $user = (new User(new UserDm()))->setPassword('$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.');

        $this->expectException(UserException::class);
        $this->expectExceptionCode(4000);
        $this->expectExceptionMessage("Incorrect password");

        $incorrectPassword = 'senhaIncorreta';
        $user->checkPassword($incorrectPassword);
    }

    public function testDecryptPasswordAndValidateEquality()
    {
        $user = (new User(new UserDm()))->setPassword('$2y$10$/vC1UKrEJQUZLN2iM3U9re/4DQP74sXCOVXlYXe/j9zuv1/MHD4o.');

        $correctPassword = 'a';

        $this->assertSame($user, $user->checkPassword($correctPassword));
    }

    public function testSearchForUserByNonExistentCpf()
    {
        $cpf = (new Cpf('16283345093'));
        $user = (new User(new UserDm()))
            ->setId('15de1f6f-befd-429c-8a4b-add21360a810')
            ->setCpf($cpf)
        ;

        $this->expectException(UserException::class);
        $this->expectExceptionCode(4000);
        $this->expectExceptionMessage("CPF '16283345093' not found.");

        $user-> loadByCpf();
    }
}