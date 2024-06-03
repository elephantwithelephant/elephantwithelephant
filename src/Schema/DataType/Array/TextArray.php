<?php

namespace ElephantWithElephant\Schema\DataType\Array;

use ElephantWithElephant\DataTransformation\ArrayTransformer;
use ElephantWithElephant\Schema\DataType\ColumnBase;

class TextArray extends ColumnBase
{
    const string FIELD_TYPE = 'TEXT[]';

    public function dataTransformers(): array
    {
        return [new ArrayTransformer()];
    }
}
