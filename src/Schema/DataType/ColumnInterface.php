<?php

namespace ElephantWithElephant\Schema\DataType;

interface ColumnInterface
{
    public function columnName(): string;
    public function expressionInSelectStatement(string $alias = null): string;
    public function expressionInCreateTable(): string;
    public function transformResult(mixed $value): mixed;
}
