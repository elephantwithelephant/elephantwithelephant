<?php

namespace ElephantWithElephant\Statement\Clause\Condition;

use ElephantWithElephant\Schema\Column\ColumnSchemaInterface;

class SimpleCondition implements ConditionInterface
{
    public function __construct(
        protected string $columnName,
        protected string|int|float $value,
        protected string $operator = '=',
    ) {}

    public function __toString(): string
    {
        return $this->columnName . ' ' . $this->operator . ' $' . spl_object_hash($this);
    }

    public function getParameters(): array
    {
        return ['$' . spl_object_hash($this) => $this->value];
    }
}
