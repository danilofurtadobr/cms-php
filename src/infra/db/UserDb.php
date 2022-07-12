<?php

namespace src\infra\db;

use src\infra\framework\db\Query;

use src\domain\user\UserInterface;
use src\domain\user\UserRepositoryInterface;

class UserDb implements UserRepositoryInterface
{
    public function findByCpf(UserInterface $user): bool
    {
        $record = ($this->build())
            ->where(['cpf' => $user->getCpf()->getNumber()])
            ->one()
        ;

        if (!$record) {
            return false;
        }

        $user
            ->setId($record['id'])
            ->setName($record['name'])
            ->setPassword($record['password'])
        ;

        return true;
    }

    public function findByEmail(UserInterface $user): bool
    {
        $record = ($this->build())
            ->where(['email' => $user->getEmail()])
            ->one()
        ;

        if (!$record) {
            return false;
        }

        $user
            ->setId($record['id'])
            ->setName($record['name'])
            ->setPassword($record['password'])
        ;

        return true;
    }

    private function build(): Query
    {
        return (new Query())
            ->select(['id', 'name', 'password'])
            ->from('users')
        ;
    }
}
