<?php

namespace ElephantWithElephant\Statement\Command;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Statement\StatementBase;

class CreateTable extends StatementBase
{
    public function __construct(
        Connection $connection,
        protected $tableName,
    ) {
        parent::__construct($connection);
    }

    public function __toString()
    {
        return 'CREATE TABLE ' . $this->tableName . ' (name TEXT, code INT, tags TEXT[])';
    }
}
