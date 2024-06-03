<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Schema\DataType\ColumnInterface;
use ElephantWithElephant\Schema\Schema;
use ElephantWithElephant\Statement\StatementBase;

class CreateTable extends StatementBase
{
    public function __construct(
        Connection $connection,
        protected Schema $schema,
    ) {
        parent::__construct($connection);
    }

    public function __toString()
    {
        $columns = array_map(fn (ColumnInterface $column) => $column->expressionInCreateTable(), $this->schema->columns);
        return 'CREATE TABLE ' . $this->schema->tableName . ' (' . implode(', ', $columns) . ')';
    }
}
