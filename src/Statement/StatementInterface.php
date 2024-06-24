<?php

namespace ElephantWithElephant\Statement;

use ElephantWithElephant\Result\ResultInterface;
use ElephantWithElephant\Statement\Clause\ClauseInterface;

interface StatementInterface extends ClauseInterface
{
    public function execute(): ResultInterface;
}
