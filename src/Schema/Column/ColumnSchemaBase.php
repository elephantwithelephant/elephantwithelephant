<?php

namespace ElephantWithElephant\Schema\Column;

abstract class ColumnSchemaBase implements ColumnSchemaInterface
{
    public const string DATA_TYPE = '';

    public function __construct(
        protected string $columnName,
    ) {}

    public function getColumnName(): string
    {
        return $this->columnName;
    }

    public function expressionInSelectStatement(?string $alias = null): string
    {
        return '"' . $this->columnName . '"' . $this->asClause($alias);
    }

    public function expressionInCreateTable(): string
    {
        return $this->columnName . ' ' . static::DATA_TYPE;
    }

    protected function asClause(?string $alias = null): string
    {
        if (!$alias) {
            return '';
        }

        if (!preg_match('/^[A-z][A-z0-9_]*$/', $alias)) {
            throw new \Exception('Alias must start with a letter and contain only letters, numbers and underscores.');
        }

        return " AS $alias";
    }
}
