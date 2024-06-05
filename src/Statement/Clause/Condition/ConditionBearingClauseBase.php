<?php

namespace ElephantWithElephant\Statement\Clause\Condition;

use ElephantWithElephant\Statement\Clause\ClauseInterface;
use ElephantWithElephant\Statement\ConditionBearingStatementInterface;

abstract class ConditionBearingClauseBase implements ConditionBearingStatementInterface, ClauseInterface
{
    protected array $conditions = [];

    public function __construct(
        protected string $operator = 'AND',
    ) {}

    public function condition(string $columnName, string|int|float $value, string $operator = '='): static
    {
        $this->conditions[] = new SimpleCondition($columnName, $value, $operator);

        return $this;
    }

    public function __toString(): string
    {
        return implode(' ' . $this->operator . ' ', $this->conditions);
    }
}
