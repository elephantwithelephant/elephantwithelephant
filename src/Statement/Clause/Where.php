<?php

namespace ElephantWithElephant\Statement\Clause;

use ElephantWithElephant\Statement\Command\Select;
use ElephantWithElephant\Statement\StatementInterface;

class Where {

    public function __construct(
        protected StatementInterface $statement,
        protected string $tempCondition,
    ) {

    }

    public function end(): Select
    {
        return $this->statement;
    }

    public function __toString()
    {
        return 'WHERE ' . $this->tempCondition;
    }
}
