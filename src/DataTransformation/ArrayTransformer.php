<?php

namespace ElephantWithElephant\DataTransformation;

class ArrayTransformer extends DataTransformerBase
{
    public function transformSelectCommand(string $fieldName): string
    {
        return "array_to_json(\"$fieldName\")";
    }

    public function transformFetch(mixed $value): mixed
    {
        return json_decode($value, associative: true);
    }
}
