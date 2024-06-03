<?php

namespace ElephantWithElephant\Schema\DataType;

abstract class ColumnBase implements ColumnInterface
{
    const string FIELD_TYPE = '';

    public function __construct(
        protected string $columnName,
    ) {}

    public function columnName(): string
    {
        return $this->columnName;
    }

    public function expressionInSelectStatement(): string
    {
        return '"' . $this->columnName . '"';
    }

    public function expressionInCreateTable(): string
    {
        return $this->columnName . ' ' . static::FIELD_TYPE;
    }
}
