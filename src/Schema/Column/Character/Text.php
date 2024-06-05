<?php

namespace ElephantWithElephant\Schema\Column\Character;

use ElephantWithElephant\Schema\Column\ColumnSchemaBase;

class Text extends ColumnSchemaBase
{
    const string DATA_TYPE = 'TEXT';

    public function transformResult(mixed $value): mixed
    {
        return $value;
    }
}
