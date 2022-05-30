<?php

namespace db;

use config\ConnectionDb;

class Query
{
    private const QUERY_BUILD_FROM = 'FROM';
    private const QUERY_BUILD_SELECT = 'SELECT';
    private const QUERY_BUILD_WHERE = 'WHERE';

    private $query;
    private $connection;

    public function __construct()
    {
        $this->connection = new ConnectionDb();
    }

    private function hasQuery(): bool
    {
        return $this->query ? true : false;
    }

    public function select(array $columns): void
    {
        foreach($columns as $column) {
            if (!$this->hasQuery()) {
                $this->addSelectInQuery($column);
            } else {
                $this->addColumnInSelect($column);
            }
        }
    }

    private function addColumnInSelect(string $column): void
    {
        $this->query = "{$this->query}, {$column}";
    }

    private function addSelectInQuery(string $column): void
    {
        $select = self::QUERY_BUILD_SELECT;
        $this->query = "{$select} {$column}";
    }

    public function from(string $table): void
    {
        $this->checkStartedQuery();

        $from = self::QUERY_BUILD_FROM;
        $this->query = "{$this->query} {$from} {$table}";
    }

    private function checkStartedQuery(): void
    {
        if (empty($this->query)) {
            throw new \Exception("The query was not started to be able to use this method.");
        }
    }

    public function where(array $params): void
    {
        $this->checkQueryProgress(self::QUERY_BUILD_FROM);

        foreach ($params as $param => $filter) {
            if (!$this->hasWhere()) {
                $this->addWhereInQuery($param, $filter);
            } else {
                $this->addFilterInWhere($param, $filter);
            }
        }
    }

    private function addFilterInWhere(string $param, string $filter): void
    {
        $this->query = "{$this->query} AND {$param} = '{$filter}'";
    }

    private function hasWhere(): bool
    {
        return strpos($this->query, self::QUERY_BUILD_WHERE);
    }

    private function addWhereInQuery(string $param, string $filter): void
    {
        $where = self::QUERY_BUILD_WHERE;
        $this->query = "{$this->query} {$where} {$param} = '{$filter}'";
    }

    private function checkQueryProgress(string $stage): void
    {
        if (!strpos($this->query, $stage)) {
            throw new \Exception("The query '{{$this->query}}' is missing argument '{{$stage}}'.");
        }
    }

    public function execute(): array
    {
        $sql = "{$this->query};";
        return $this->connection->getResultFromQuery($sql);
    }
}
