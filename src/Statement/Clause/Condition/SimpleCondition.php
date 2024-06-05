<?php

namespace ElephantWithElephant\Statement\Clause\Condition;

class SimpleCondition implements ConditionInterface
{
    public function __construct(
        protected string $columnName,
        protected string|int|float $value,
        protected string $operator = '=',
    ) {}

    public function __toString(): string
    {
        return $this->columnName . ' ' . $this->operator . " '" . $this->value . "'";
    }
}
