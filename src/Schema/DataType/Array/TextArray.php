<?php

namespace ElephantWithElephant\Schema\DataType\Array;

use ElephantWithElephant\DataTransformation\ArrayTransformer;
use ElephantWithElephant\Schema\DataType\ColumnBase;

class TextArray extends ColumnBase
{
    const string FIELD_TYPE = 'TEXT[]';

    public function expressionInSelectStatement(?string $alias = null): string
    {
        return 'array_to_json("' . $this->columnName() . '")' . $this->asClause($alias ?? $this->columnName());
    }

    public function transformResult(mixed $value): mixed
    {
        return \json_decode($value, associative: true);
    }
}
