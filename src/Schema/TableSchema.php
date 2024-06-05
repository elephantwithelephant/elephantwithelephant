<?php

namespace ElephantWithElephant\Schema;

use ElephantWithElephant\Schema\Column\ColumnSchemaInterface;

class TableSchema
{
    /** @var ColumnSchemaInterface[] */
    protected array $columns = [];

    /** @param ColumnSchemaInterface[] $columns */
    public function __construct(
        protected string $tableName,
        array $columns,
    ) {
        // @todo Assert that all $columns are ColumnSchemaInterface.
        foreach ($columns as $column) {
            $this->columns[$column->getColumnName()] = $column;
        }
    }

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getColumn(string $columnName): ColumnSchemaInterface
    {
        if (!isset($this->columns[$columnName])) {
            throw new \Exception("Column $columnName does not exist in table $this->tableName.");
        }

        return $this->columns[$columnName];
    }

    /**
     * @return ColumnSchemaInterface[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }
}
