<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Result\ResultInterface;
use ElephantWithElephant\Result\ResultIterator;
use ElephantWithElephant\Schema\Column\ColumnSchemaInterface;
use ElephantWithElephant\Schema\TableSchema;
use PgSql\Result;

class Select extends WhereBearingCommandBase
{
    public function __construct(
        Connection $connection,
        protected TableSchema $schema,
    ) {
        parent::__construct($connection);
    }

    public function __toString()
    {
        $columns = array_map(fn(ColumnSchemaInterface $column) => $column->expressionInSelectStatement(), $this->schema->getColumns());

        return 'SELECT ' . implode(',', $columns) . ' FROM "' . $this->schema->getTableName() . '" ' . $this->where . ';';
    }

    public function getParameters(): array
    {
        return $this->where()->getParameters();
    }

    public function execute(): ResultIterator
    {
        /** @var ResultIterator */
        $result = parent::execute();

        return $result;
    }

    protected function processResult(Result $pgSqlResult): ResultInterface
    {
        return new ResultIterator($pgSqlResult, $this->schema);
    }
}
