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

    public function apiLogin()
    {
        try {
            var_dump( $_SERVER['HTTP_USER_AGENT'], $this->getClientIp());
            echo ['teste' => '1'];
        } catch(UserException $e) {
            $message = ErrorCodes::translate($e);

            setExceptionMessageAndRedirect('message', $message, '/');
        } catch(\Exception $e) {
            setExceptionMessageAndRedirect('message', ErrorCodes::ERROR_500, '/');
        }
    } 

    private function getClientIp() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}
}
