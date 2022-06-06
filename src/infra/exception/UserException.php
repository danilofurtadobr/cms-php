<?php

namespace src\infra\exception;

class UserException extends \Exception
{
    private ?string $data;

    public function __construct(string $message, int $code, ?string $data = null)
    {
        $this->data = $data;

        parent::__construct($message, $code);
    }

    public function getData(): ?string
    {
        return $this->data;
    }
}
