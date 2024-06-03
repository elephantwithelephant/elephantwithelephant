<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Statement\Clause\Condition\Where;
use ElephantWithElephant\Statement\ConditionBearingStatementInterface;
use ElephantWithElephant\Statement\StatementBase;

abstract class WhereBearingCommandBase extends StatementBase implements ConditionBearingStatementInterface
{
    protected ?Where $where;

    public function where(): Where
    {
        if (!isset($this->where)) {
            $this->where = new Where();
        }

        return $this->where;
    }

    public function condition(string $columnName, string|int|float $value, string $operator = '='): static
    {
        $this->where()->condition($columnName, $value, $operator);
        return $this;
    }
}
