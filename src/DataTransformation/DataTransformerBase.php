<?php

namespace ElephantWithElephant\DataTransformation;

abstract class DataTransformerBase implements DataTransformerInterface
{
    public function transformSelectCommand(string $fieldName): string {
        return '"$fieldName"';
    }

    public function transformFetch(mixed $value): mixed {
        return $value;
    }
}
