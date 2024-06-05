<?php

namespace ElephantWithElephant\Statement;

use ElephantWithElephant\Result\ResultInterface;

interface StatementInterface
{
    public function execute(): ResultInterface;
}
