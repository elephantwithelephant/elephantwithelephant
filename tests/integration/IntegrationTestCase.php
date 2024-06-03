<?php

namespace ElephantWithElephant\Tests\Integration;

use ElephantWithElephant\Connection;
use PHPUnit\Framework\TestCase;

class IntegrationTestCase extends TestCase
{
    protected Connection $connection;

    public function setUp(): void
    {
        $databaseCreationconnection = new Connection(user: 'postgres', password: 'zunesha', port: 5433);
        $databaseCreationconnection->runRaw('DROP DATABASE IF EXISTS elephant_integration_test_db');
        $databaseCreationconnection->runRaw('CREATE DATABASE elephant_integration_test_db');
        $this->connection = new Connection(dbname: 'elephant_integration_test_db', user: 'postgres', password: 'zunesha', port: 5433);
    }
}
