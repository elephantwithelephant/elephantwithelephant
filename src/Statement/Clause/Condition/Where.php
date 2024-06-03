<?php

namespace ElephantWithElephant\Statement\Clause\Condition;

use ElephantWithElephant\Statement\Command\Select;
use ElephantWithElephant\Statement\StatementInterface;

class Where extends ConditionBearingClauseBase {

    public function __toString()
    {
        return 'WHERE ' . parent::__toString();
    }
}
