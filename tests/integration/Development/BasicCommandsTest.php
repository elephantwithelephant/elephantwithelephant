<?php

namespace ElephantWithElephant\Tests\Integration\Development;

use ElephantWithElephant\Schema\Column\Array\TextArray;
use ElephantWithElephant\Schema\Column\Character\Text;
use ElephantWithElephant\Schema\Column\Numeric\Integer;
use ElephantWithElephant\Schema\DatabaseSchema;
use ElephantWithElephant\Schema\TableSchema;
use ElephantWithElephant\Tests\Integration\IntegrationTestCase;

class BasicCommandsTest extends IntegrationTestCase
{
    public function testBasicCommands(): void
    {
        $tableSchema = new TableSchema(
            'person',
            [
                new Text('name'),
                new Integer('code'),
                new TextArray('tags'),
            ],
        );
        $databaseSchema = new DatabaseSchema([$tableSchema]);

        $this->connection
            ->setSchema($databaseSchema)
            ->createTable('person')
            ->execute()
        ;
        $this->connection->runRaw("INSERT INTO person VALUES('Salvador Dalí', 123, '{\"painter\", \"surrealist\", \"elephants\"}')");
        $result = $this->connection
            ->select('person')
            ->condition('code', 123)
            ->execute()
        ;
        foreach ($result as $row) {
            var_dump($row);
        }
    }
}
