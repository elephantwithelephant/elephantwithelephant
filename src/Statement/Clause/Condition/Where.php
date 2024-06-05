<?php

namespace ElephantWithElephant\Statement\Clause\Condition;

class Where extends ConditionBearingClauseBase
{
    public function __toString()
    {
        return 'WHERE ' . parent::__toString();
    }
}
