<?php

namespace db;

class Query
{
    private const QUERY_BUILD_FROM = 'FROM';
    private const QUERY_BUILD_SELECT = 'SELECT';
    private const QUERY_BUILD_WHERE = 'WHERE';

    private $table;
    private $query;

    private function hasQuery(): bool
    {
        return $this->query ? true : false;
    }

    public function from(string $table): void
    {
        $this->table = $table;
    }

    public function select(array $columns): void
    {
        $this->checkLoadedTable();

        foreach($columns as $column) {
            if (!$this->hasQuery()) {
                $this->addSelectInQuery(self::QUERY_BUILD_SELECT . " " . $column);
            } else {
                $this->addColumnInSelect($column);
            }
        }
    }

    private function addColumnInSelect(string $column): void
    {
        $newColumn = $column . ',';
        $this->query = substr($newColumn, $column, 7);
    }

    private function addSelectInQuery(string $select): void
    {
        $this->query = $select . " " . self::QUERY_BUILD_FROM . " " . $this->table;
    }

    private function checkLoadedTable(): void
    {
        if (empty($this->table)) {
            throw new \Exception("The table is not loaded, the 'from' method was not used correctly.");
        }
    }

    public function where(array $params): void
    {
        $this->checkQueryProgress(self::QUERY_BUILD_SELECT);

        foreach ($params as $param) {
            if (!$this->hasWhere()) {
                $this->addWhereInQuery(self::QUERY_BUILD_WHERE . $param);
            } else {
                $this->addFilterInWhere($param);
            }
        }
    }

    private function addFilterInWhere(string $param):void
    {
        $this->query = $this->query
    }

    private function hasWhere(): bool
    {
        return strpos($this->query, self::QUERY_BUILD_WHERE);
    }

    private function addWhereInQuery(string $where): void
    {
        $this->query = $this->query . $where;
    }

    private function checkQueryProgress(string $stage): void
    {
        if (strpos($this->query, $stage)) {
            throw new \Exception("The query '{{$this->query}}' is missing argument '{{$stage}}' .");
        }
    }
}
