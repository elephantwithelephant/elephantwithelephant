<?php

namespace ElephantWithElephant\Schema\Column\Numeric;

use ElephantWithElephant\Schema\Column\ColumnSchemaBase;

class Integer extends ColumnSchemaBase
{
    public const string DATA_TYPE = 'INTEGER';

    public function transformResult(string $value): mixed
    {
        return (int) $value;
    }
}
