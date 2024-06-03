<?php

namespace ElephantWithElephant\Statement;

use ElephantWithElephant\Connection;
use ElephantWithElephant\Result\NullResult;
use ElephantWithElephant\Result\ResultInterface;
use PgSql\Result as PgSqlResult;

abstract class StatementBase implements StatementInterface
{
    public function __construct(
        protected Connection $connection,
    ) {}

    public function execute(): ResultInterface
    {
        $pgSqlResult = $this->connection->runRaw((string) $this);
        return $this->processResult($pgSqlResult);
    }

    protected function processResult(PgSqlResult $pgSqlResult): ResultInterface
    {
        return new NullResult();
    }
}
