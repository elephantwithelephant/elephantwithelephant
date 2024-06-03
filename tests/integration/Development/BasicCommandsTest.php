<?php

namespace ElephantWithElephant\Tests\Integration\Development ;

use ElephantWithElephant\Schema\DataType\Array\TextArray;
use ElephantWithElephant\Schema\DataType\Character\Text;
use ElephantWithElephant\Schema\DataType\Numeric\Integer;
use ElephantWithElephant\Schema\Schema;
use ElephantWithElephant\Tests\Integration\IntegrationTestCase;

class BasicCommandsTest extends IntegrationTestCase
{
    public function testBasicCommands(): void
    {
        $schema = new Schema(
            'person',
            [
                new Text('name'),
                new Integer('code'),
                new TextArray('tags'),
            ],
        );

        $this->connection
            ->createTable($schema)
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
