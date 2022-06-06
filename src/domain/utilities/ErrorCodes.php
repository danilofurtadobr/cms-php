<?php

namespace src\domain\utilities;

use src\infra\exception\UserException;

class ErrorCodes
{
    public const ERROR_500 = "Erro de servidor.";
    public const LANG_PT_BR = 'pt_BR';

    public const USER_PASSWORD_OR_LOGIN_INCORRECT = 4000;
    public const USER_CPF_INVALID = 4001;

    public const TRANSLATIONS_PT_BR = [ 
        self::USER_PASSWORD_OR_LOGIN_INCORRECT => 'Usuário ou senha incorreto.',
        self::USER_CPF_INVALID => 'CPF inválido',
    ];

    public const TRANSLATIONS = [
        self::LANG_PT_BR => self::TRANSLATIONS_PT_BR,
    ];

    public static function translate(UserException $e, string $lang = self::LANG_PT_BR): string
    {
        $code = $e->getCode();
        $data = $e->getData();

        $translation = empty(self::TRANSLATIONS[$lang][$code])
            ? 'Mensagem de erro sem tradução. Entre em contato com o suporte'
            : self::TRANSLATIONS[$lang][$code];

        if ($data) {
            $translation .= " - $data";
        }

        return $translation;
    }
}