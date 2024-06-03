<?php

namespace ElephantWithElephant\DataTransformation;

class IntegerTransformer extends DataTransformerBase
{
    public function transformFetch(mixed $value): mixed
    {
        return !is_null($value) ? (int) $value : null;
    }
}
