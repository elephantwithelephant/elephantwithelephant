<?php

namespace ElephantWithElephant\Tests\Integration\Development ;

use ElephantWithElephant\Tests\Integration\IntegrationTestCase;

class BasicCommandsTest extends IntegrationTestCase
{
    public function testBasicCommands(): void
    {
        $this->connection
            ->createTable('person')
            ->execute()
        ;
        $this->connection->runRaw("INSERT INTO person VALUES('Salvador Dalí', 123, '{\"painter\", \"surrealist\", \"elephants\"}')");
        $result = $this->connection
            ->select('person')
            ->where('code = 123')
            ->end()
            ->execute()
        ;
    }
}
