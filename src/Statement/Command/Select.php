<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Result\ResultInterface;
use ElephantWithElephant\Result\ResultIterator;
use ElephantWithElephant\Schema\DataType\ColumnInterface;
use ElephantWithElephant\Schema\Schema;
use PgSql\Result;

class Select extends WhereBearingCommandBase
{
    public function __construct(
        Connection $connection,
        protected Schema $schema,
    ) {
        parent::__construct($connection);
    }

    public function __toString()
    {
        $columns = array_map(fn(ColumnInterface $column) => $column->expressionInSelectStatement(), $this->schema->columns);
        return 'SELECT ' . implode(',', $columns) . ' FROM "' . $this->schema->tableName . '" ' . $this->where . ';';
    }

    public function execute(): ResultIterator
    {
        return parent::execute();
    }

    protected function processResult(Result $pgSqlResult): ResultInterface
    {
        return new ResultIterator($pgSqlResult, $this->schema);
    }
}
