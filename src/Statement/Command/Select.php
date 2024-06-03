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
        if ($this->schema) {
            $columns = [];
            foreach ($this->schema as $column) {
                foreach ($this->)
            }
        }
        else {
            $columns = ['*'];
        }

        return 'SELECT ' . implode(',', $columns) . ' FROM "' . $this->tableName . '" ' . $this->where . ';';
    }

    public function execute(): ResultIterator
    {
        return parent::execute();
    }

    protected function processResult(Result $pgSqlResult): ResultInterface
    {
        $dataTransformers = [];
        if ($this->schema) {
            $dataTransformers = array_map(fn (ColumnInterface $column) => $column->dataTransformers(), $this->schema->columns);
        }

        return new ResultIterator($pgSqlResult, $dataTransformers);
    }
}
