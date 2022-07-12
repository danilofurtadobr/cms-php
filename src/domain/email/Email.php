<?php

namespace src\domain\email;

use src\domain\utilities\ErrorCodes;
use src\infra\exception\UserException;

class Email
{
    private ?string $email;

    public function __construct(string $email)
    {
        $this->email = $email;
        $this->validate();
        $this->load();
    }

    private function load(): string
    {
        return $this->email;
    }

    private function validate(): void
    {
        if (!preg_match("/^[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/", $this->email)) {
            throw new UserException("The email '{$this->email}' is not valid", ErrorCodes::USER_EMAIL_INVALID);
        }

        if (mb_strlen($this->email) > 255) {
            throw new \Exception("The email '{$this->email}' exceeds the number of characters.");
        }
    }
}
