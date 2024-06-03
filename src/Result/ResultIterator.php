<?php

namespace ElephantWithElephant\Result;

use ElephantWithElephant\DataTransformation\DataTransformerBase;
use PgSql\Result as PgSqlResult;

final class ResultIterator implements \Iterator, ResultInterface
{
    private bool $valid = true;
    private int $key = -1;
    private mixed $row = null;

    /** @param \ElephantWithElephant\DataTransformation\DataTransformerInterface[] $dataTransformers */
    public function __construct(
        private PgSqlResult $pgSqlResult,
        private array $dataTransformers,
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

        if ($this->row === false) {
            $this->valid = false;
        }
        else {
            foreach ($this->row as $columnName => $value) {
                /** @var \ElephantWithElephant\DataTransformation\DataTransformerInterface[] */
                $dataTransformersOfRow = $this->dataTransformers[$columnName] ?? [];
                foreach ($dataTransformersOfRow as $dataTransformer) {
                    $this->row[$columnName] = $dataTransformer->transformFetch($value);
                }
            }

            $this->key++;
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
        if ($this->key === -1) {
            $this->next();
        }

        return $this->valid;
    }
}
