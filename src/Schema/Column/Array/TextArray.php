<?php

namespace ElephantWithElephant\Schema\Column\Array;

use ElephantWithElephant\Schema\Column\ColumnSchemaBase;

class TextArray extends ColumnSchemaBase
{
    const string DATA_TYPE = 'TEXT[]';

    public function expressionInSelectStatement(?string $alias = null): string
    {
        return 'array_to_json("' . $this->getColumnName() . '")' . $this->asClause($alias ?? $this->getColumnName());
    }

    public function transformResult(mixed $value): mixed
    {
        return \json_decode($value, associative: true);
    }
}
