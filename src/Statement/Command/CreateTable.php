<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
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
        return 'CREATE TABLE ' . $this->schema->tableName . ' (' . implode(', ', $this->schema->fields) . ')';
    }
}
