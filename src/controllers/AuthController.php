<?php

namespace src\controllers;

use src\infra\db\UserDb;
use src\domain\user\User;
use src\domain\utilities\ErrorCodes;
use src\domain\cpf\Cpf;
use src\infra\exception\UserException;

class AuthController
{
    public function login()
    {
        try {
            $cpfNumber = filter_input(INPUT_POST, 'user');
            $password = filter_input(INPUT_POST, 'password');

            $cpf = new Cpf(number: $cpfNumber);
            $cpf->validate();

            $user = (new User(new UserDb))
                ->setCpf($cpf)
                ->loadByCpf()
                ->checkPassword($password)
            ;

            $_SESSION[LOGGED] = $user;
            redirect('/');
        } catch(UserException $e) {
            $message = ErrorCodes::translate($e);

            setExceptionMessageAndRedirect('message', $message, '/');
        } catch(\Exception $e) {
            setExceptionMessageAndRedirect('message', ErrorCodes::ERROR_500, '/');
        }
    }

    public function logout()
    {
        try {
            if (isset($_SESSION)) {
                unset($_SESSION[LOGGED]);
            }

            redirect('/login');
        } catch(UserException $e) {
            $message = ErrorCodes::translate($e);

            setExceptionMessageAndRedirect('message', $message, '/login');
        } catch(\Exception $e) {
            setExceptionMessageAndRedirect('message', ErrorCodes::ERROR_500, '/login');
        }
    }
}
