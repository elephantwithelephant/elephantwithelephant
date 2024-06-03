<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Statement\Clause\Where;
use ElephantWithElephant\Statement\StatementBase;

class Select extends StatementBase
{
    protected ?Where $where;

    public function __construct(
        Connection $connection,
        protected string $tableName,
    ) {
        parent::__construct($connection);
    }

    public function condition(string $tempCondition): Where
    {
        return $this->where = new Where($this, $tempCondition);
    }

    public function __toString()
    {
        return 'SELECT * FROM "' . $this->tableName . '" ' . $this->where . ';';
    }
}
