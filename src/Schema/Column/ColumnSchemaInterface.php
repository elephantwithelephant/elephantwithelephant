<?php

namespace ElephantWithElephant\Schema\Column;

interface ColumnSchemaInterface
{
    public function getColumnName(): string;
    public function expressionInSelectStatement(string $alias = null): string;
    public function expressionInCreateTable(): string;
    public function transformResult(mixed $value): mixed;
}
