<?php

namespace ElephantWithElephant\DataTransformation;

interface DataTransformerInterface
{
    public function transformSelectCommand(string $fieldName): string;
    public function transformFetch(mixed $value): mixed;
}
