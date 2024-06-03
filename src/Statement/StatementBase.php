<?php

namespace ElephantWithElephant\Statement;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Result\NullResult;
use ElephantWithElephant\Result\ResultInterface;

class StatementBase implements StatementInterface
{
    public function __construct(
        protected Connection $connection,
    ) {}

    public function execute(): ResultInterface
    {
        $this->connection->runRaw((string) $this);
        return new NullResult();
    }
}
