<?php

namespace ElephantWithElephant;

use ElephantWithElephant\Schema\DatabaseSchema;
use ElephantWithElephant\Statement\Command\CreateTable;
use ElephantWithElephant\Statement\Command\Select;
use PgSql\Connection as PgSqlConnection;
use PgSql\Result as PgSqlResult;

class Connection
{
    protected PgSqlConnection $internalConnection;
    protected DatabaseSchema $schema;

    public function __construct(
        ?string $dbname = NULL,
        ?string $user = NULL,
        ?string $password = NULL,
        ?string $host = 'localhost',
        ?int $port = 5432,
        ?int $connect_timeout = 0,
        ?string $sslmode = NULL,
        ?string $service = NULL,
        ?string $hostaddr = NULL,
        ?string $options = '--client_encoding=UTF8',
    )
    {
        $parameters = [
            'dbname' => $dbname,
            'user' => $user,
            'password' => $password,
            'host' => $host,
            'port' => $port,
            'connect_timeout' => $connect_timeout,
            'sslmode' => $sslmode,
            'service' => $service,
            'hostaddr' => $hostaddr,
            'options' => $options ? "'$options'" : NULL,
        ];

        $parameters = array_filter($parameters);
        $connectionString = implode(' ', array_map(
            fn($parameter, $parameterName) => "$parameterName=$parameter",
            $parameters,
            array_keys($parameters),
        ));

        $this->internalConnection = pg_connect($connectionString);
    }

    public function getSchema(): DatabaseSchema
    {
        return $this->schema;
    }

    public function setSchema(DatabaseSchema $schema): static
    {
        $this->schema = $schema;
        return $this;
    }

    public function runRaw(string $query): PgSqlResult|false
    {
        return pg_query($this->internalConnection, $query);
    }

    public function createTable(string $tableName): CreateTable
    {
        return new CreateTable($this, $this->schema->getTable($tableName));
    }

    public function select(string $tableName): Select
    {
        return new Select($this, $this->schema->getTable($tableName));
    }

    //public function insert()
    //public function update()
    //public function delete()
}
