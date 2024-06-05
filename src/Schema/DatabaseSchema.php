<?php

namespace ElephantWithElephant\Schema;

class DatabaseSchema
{
    /** @var TableSchema[] */
    protected array $tables;

    /** @param TableSchema[] $tables */
    public function __construct(
        array $tables,
    ) {
        // @todo Assert that all $tables are TableSchema.
        foreach ($tables as $table) {
            $this->tables[$table->getTableName()] = $table;
        }
    }

    public function getTable(string $tableName): TableSchema
    {
        if (!isset($this->tables[$tableName])) {
            throw new \Exception("Unknown table $tableName.");
        }

        return $this->tables[$tableName];
    }

    public function setTable(TableSchema $table): static
    {
        $this->tables[$table->getTableName()] = $table;

        return $this;
    }
}
