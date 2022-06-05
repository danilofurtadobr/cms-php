<?php

namespace app\domain;

use Ramsey\Uuid\Uuid;

trait UuidTrait
{
    public function generateId()
    {
        $this->id = Uuid::uuid4()->toString();
        return $this;
    }

    public function setId(string $id)
    {
        if (!preg_match('/[0-9a-fA-F]{8}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{4}\-[0-9a-fA-F]{12}/', $id)) {
            throw new Exception("The id '$id' is not an uuid");
        }

        $this->id = $id;

        return $this;
    }
}
