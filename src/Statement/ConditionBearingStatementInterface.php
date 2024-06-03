<?php

namespace ElephantWithElephant\Statement;

interface ConditionBearingStatementInterface
{
    public function condition(string $columnName, string|int|float $value, string $operator = '='): static;
}
