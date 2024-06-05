<?php

namespace ElephantWithElephant\Result;

use ElephantWithElephant\Schema\TableSchema;
use PgSql\Result as PgSqlResult;

final class ResultIterator implements \Iterator, ResultInterface
{
    private bool $valid = true;
    private int $key = -1;
    private mixed $row = null;

    public function __construct(
        private PgSqlResult $pgSqlResult,
        private TableSchema $schema,
    ) {}

    public function current(): mixed
    {
        return $this->row;
    }

    public function key(): mixed
    {
        return $this->key;
    }

    public function next(): void
    {
        $this->row = pg_fetch_array($this->pgSqlResult, mode: PGSQL_ASSOC);

        if (false === $this->row) {
            $this->valid = false;
        } else {
            foreach ($this->row as $columnName => $value) {
                $this->row[$columnName] = $this->schema->getColumn($columnName)->transformResult($value);
            }

            ++$this->key;
        }
    }

    public function rewind(): void
    {
        if ($this->key > -1) {
            throw new \Exception('Iterator is not rewindable.');
        }
    }

    public function valid(): bool
    {
        if (-1 === $this->key) {
            $this->next();
        }

        return $this->valid;
    }
}
