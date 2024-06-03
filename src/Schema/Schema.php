<?php

namespace ElephantWithElephant\Schema;

class Schema
{
    /** @var \ElephantWithElephant\Schema\DataType\ColumnInterface[] */
    public readonly array $columns;

    /** @param \ElephantWithElephant\Schema\DataType\ColumnInterface[] $columns */
    public function __construct(
        public readonly string $tableName,
        array $columns,
    ) {
        $columnsWithKey = [];
        foreach ($columns as $column) {
            $columnsWithKey[$column->columnName()] = $column;
        }
        $this->columns = $columnsWithKey;
    }
}
