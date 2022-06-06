<?php

namespace src\infra\framework\db;

interface QueryInterface
{
    public function select(array $columns): QueryInterface;
    public function from(string $table): QueryInterface;
    public function where(array $params): QueryInterface;
}
