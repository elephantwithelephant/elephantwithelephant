<?php

namespace ElephantWithElephant\Schema\DataType\Numeric;

use ElephantWithElephant\DataTransformation\IntegerTransformer;
use ElephantWithElephant\Schema\DataType\ColumnBase;

class Integer extends ColumnBase
{
    const string FIELD_TYPE = 'INTEGER';

    public function transformResult(mixed $value): mixed
    {
        return (int) $value;
    }
}
