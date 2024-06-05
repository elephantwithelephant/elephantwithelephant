<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Schema\Column\ColumnSchemaInterface;
use ElephantWithElephant\Schema\TableSchema;
use ElephantWithElephant\Statement\StatementBase;

class CreateTable extends StatementBase
{
    public function __construct(
        Connection $connection,
        protected TableSchema $schema,
    ) {
        parent::__construct($connection);
    }

    public function __toString()
    {
        $columns = array_map(fn(ColumnSchemaInterface $column) => $column->expressionInCreateTable(), $this->schema->getColumns());

        return 'CREATE TABLE ' . $this->schema->getTableName() . ' (' . implode(', ', $columns) . ')';
    }
}
