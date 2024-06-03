<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Result\ResultInterface;
use ElephantWithElephant\Result\ResultIterator;
use ElephantWithElephant\Statement\StatementBase;
use PgSql\Result;

class Select extends WhereBearingCommandBase
{
    public function __construct(
        Connection $connection,
        protected string $tableName,
    ) {
        parent::__construct($connection);
    }

    public function __toString()
    {
        return 'SELECT * FROM "' . $this->tableName . '" ' . $this->where . ';';
    }

    public function execute(): ResultIterator
    {
        return parent::execute();
    }

    protected function processResult(Result $pgSqlResult): ResultInterface
    {
        return new ResultIterator($pgSqlResult);
    }
}
